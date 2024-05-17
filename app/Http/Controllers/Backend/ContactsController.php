<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;


class ContactsController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
{
    if (is_null($this->user) || !$this->user->can('contact.view')) {
        $message = 'You are not allowed to access this page !';
        return view('errors.403', compact('message'));
    }

    $query = Contact::orderBy('status', 'asc')
        ->orderBy('id', 'desc');

    if (request()->ajax()) {
        $contacts = $query->get();

        $contactsDataTable = DataTables::of($contacts, $isTrashed)
            ->addIndexColumn()
            ->addColumn('action', function ($row) use ($isTrashed) {
                $deleteRoute = route('admin.contacts.destroy', $row->id);
                $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Contact Details" href="' . route('admin.contacts.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
                $html .= '<button class="btn waves-effect waves-light btn-danger btn-sm btn-circle delete-contact" data-contact-id="' . $row->id . '" data-delete-route="' . $deleteRoute . '" title="Delete Contact"><i class="fa fa-trash"></i></button>';
                return $html;
            })
            ->editColumn('status', function ($row) {
                if ($row->status) {
                    return '<span class="badge badge-success font-weight-100">Viewed</span>';
                } else {
                    return '<span class="badge badge-warning">Not Viewed</span>';
                }
            });

        $rawColumns = ['action', 'email', 'message', 'status'];
        return $contactsDataTable->rawColumns($rawColumns)
            ->make(true);
    }

    $query_total = $query->count();
    $messages_counts = $query
        ->selectRaw('SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS read_messages_count')
        ->selectRaw('SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) AS unread_messages_count')
        ->first();

    $read_messages = $messages_counts->read_messages_count ?? 0;
    $unread_messages = $messages_counts->unread_messages_count ?? 0;

    return view('backend.pages.contacts.index', [
        'total_messages' => $query_total,
        'unread_messages' => $unread_messages,
        'read_messages' => $read_messages,
    ]);
}


    public function destroy(Request $request, $id)
{
    // if (! $this->user->can('contact.delete')) {
    //     abort(403, 'Unauthorized action.');
    // }

    $contact = Contact::findOrFail($id);
    $contact->delete();

    // Return response indicating successful deletion
    return response()->json([
        'confirm' => true,
        'message' => 'Contact deleted successfully.'
    ]);
}
    public function show(Contact $contact): Renderable
    {
        // Make status as viewed.
        $contact->status = 1;
        $contact->admin_id = $this->user->id;
        $contact->save();

        // Show contact.
        return view('backend.pages.contacts.show', compact('contact'));
    }
}
