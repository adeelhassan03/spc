<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FaqMessages;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;


class FaqsMessagesController extends Controller
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
        

        $query = FaqMessages::orderBy('id', 'desc');

        if (request()->ajax()) {
            $orders = $query->get();

            $FaqDataTable = DataTables::of($orders, $isTrashed)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($isTrashed) {
                    $deleteRoute = route('admin.faqMessages.destroy', $row->id);
                    $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Order Details" href="' . route('admin.faqMessages.show', $row->id) . '"><i class="fa fa-eye"></i></a>';
                    $html .= '<button class="btn waves-effect waves-light btn-danger btn-sm btn-circle delete-order" data-order-id="' . $row->id . '" data-delete-route="' . $deleteRoute . '" title="Delete Order"><i class="fa fa-trash"></i></button>';
                    return $html;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Viewed</span>';
                    } else {
                        return '<span class="badge badge-warning">Unread</span>';
                    }
                });

            $rawColumns = ['action', 'status'];
            return $FaqDataTable->rawColumns($rawColumns)
                ->make(true);
        }

        $query_total = $query->count();
        // $status_counts = $query
        //     ->selectRaw('SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS processed_count')
        //     ->selectRaw('SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) AS pending_count')
        //     ->first();

        $processed_count = $status_counts->processed_count ?? 0;
        $pending_count = $status_counts->pending_count ?? 0;

        return view('backend.pages.FaqMessages.index', [
            'total_messages' => $query_total,
            'unread_messages' => $pending_count,
            'read_messages' => $processed_count,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $order = FaqMessages::findOrFail($id);
        $order->delete();

        return response()->json([
            'confirm' => true,
            'message' => 'Message deleted successfully.'
        ]);
    }

    public function show(Request $request, $id): Renderable
    {
        $message = FaqMessages::findOrFail($id);

        $message->status = 1;
        $message->admin_id = $this->user->id;
        $message->save();
        // dd($message);
        
        return view('backend.pages.FaqMessages.show', compact('message'));
    }
}
