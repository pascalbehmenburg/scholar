<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/home">
        <img src="{{ asset('img/scholar.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
        Scholar
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/schedule/{{App\Schedule::getScheduleIdByUser()}}">Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/substitution-schedule">Substitution Schedule</a>
            </li>
            @can('user-administrate')
            <li class="nav-item">
                <a class="nav-link" href="/users">Users</a>
            </li>
            @endcan
        </ul>
        <span class="navbar-text pr-4 text-white">
            <a href="/profile">{{Auth::user()->forename}} {{Auth::user()->surname}}</a>
        </span>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-danger my-2 my-sm-0" type="submit" formaction="/logout">Logout</button>
        </form>
    </div>
</nav>