<script src="{{ asset('public/modules/spc/js/jquery.js') }}"></script>
<script src="{{ asset('public/modules/spc/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/modules/spc/js/slick.js') }}"></script>
<script src="{{ asset('public/modules/spc/js/script.js') }}"></script>
<script>
// On Scroll add class
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 20) {
        $("body").addClass("darkHeader");
    }
    if (scroll <= 50) {
        $("body").removeClass("darkHeader");
    }
});
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        function getCurrentDomain() {
            return window.location.origin;
        }
        const domain = getCurrentDomain();

        fetch('/fetch-menu-items')
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                renderMenuItems(data.mainMenuItems, data.subMenuItems);
            })
            .catch(error => console.error('Error fetching menu items:', error));

        function renderMenuItems(mainMenuItems, subMenuItems) {
            const menuContainer = document.getElementById('menuContainer');
            mainMenuItems.forEach(mainMenuItem => {
                const menuItem = document.createElement('li');
                menuItem.classList.add('nav-item', 'dropdown');

                const link = document.createElement('a');
                link.classList.add('nav-link', 'dropdown-toggle');
                link.href = '#';
                link.setAttribute('role', 'button');
                link.setAttribute('data-bs-toggle', 'dropdown');
                link.setAttribute('aria-expanded', 'false');
                link.textContent = mainMenuItem.title;

                const dropdownMenu = document.createElement('div');
                dropdownMenu.classList.add('dropdown-menu');
                dropdownMenu.setAttribute('aria-labelledby', 'navbarDropdown');

                const menuContent = document.createElement('div');
                menuContent.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'hb-header-menu');

                const title = document.createElement('p');
                title.classList.add('mb-0');
                title.textContent = mainMenuItem.title;

                const closeButton = document.createElement('div');
                closeButton.innerHTML = '<i class="fa fa-close float-end" onclick="closeDropdown()"></i>';

                menuContent.appendChild(title);
                menuContent.appendChild(closeButton);

                const subMenuContent = document.createElement('div');
                subMenuContent.classList.add('d-flex', 'hb-inner-nav');

                const subMenuList = document.createElement('ul');
                subMenuList.classList.add('d-block');

                subMenuItems.forEach(subMenuItem => {
                    if (subMenuItem.group === mainMenuItem.group) {
                        const listItem = document.createElement('li');
                        const subMenuLink = document.createElement('a');
                        subMenuLink.href = domain +'/'+ subMenuItem.slug; 
                        subMenuLink.textContent = subMenuItem.title;
                        listItem.appendChild(subMenuLink);
                        subMenuList.appendChild(listItem);
                    }
                });

                subMenuContent.appendChild(subMenuList);
                dropdownMenu.appendChild(menuContent);
                dropdownMenu.appendChild(subMenuContent);
                menuItem.appendChild(link);
                menuItem.appendChild(dropdownMenu);
                menuContainer.appendChild(menuItem);
            });
        }
    });
</script>

@include('frontend.layouts.partials.flash-messages')

{{-- Any Custom script include in the `scripts` blade section --}}
@yield('scripts')