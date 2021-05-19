<ul class="list-group">
    <li class="list-group-item">
        <a href="{{ route('user.dashboard') }}">
            Dashboard
        </a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('user.order') }}">
            Orders
        </a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('user.address') }}">
            Address
        </a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('user.account-details') }}">
            Information
        </a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </a>
    </li>
</ul>
