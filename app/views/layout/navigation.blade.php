<div class="hide-for-medium-down top-bar-outer">
<nav class="top-bar top-bar-width" data-topbar>
	<ul class="title-area">
		<li class="name">
			<h1 ><a href="{{ URL::route('home') }}">Project Management</a></h1>
		</li>
	</ul>

	<section class="top-bar-section">
    <ul class="right">
      @if(Auth::check())
      <li class="has-dropdown">
        <a href="#">{{ Auth::user()->email }}</a>
        <ul class="dropdown">
          <li><a href="#">Settings</a></li>
          <li class="divider"></li>
          <li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>
        </ul>
      </li>
      @endif
    </ul>

    <ul class="left">
      @if(Auth::check() && Auth::User()->role_ID == 1)
      <li><a href="{{ URL::route('account-create') }}">Create account</a></li>
      <li><a href="{{ URL::route('project-create') }}">Create project</a></li>
      @endif
    </ul>
  </section>

</nav>
</div>

<!-- ------------- Off canvas ------------- -->

<div class="off-canvas-wrap show-for-medium-down">
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 class="title"><a href="{{ URL::route('home') }}">Project Management</a></h1>
      </section>

    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li class="name"><label>Project Management</label></li>
        <li><a href="#">Settings</a></li>
        <li><a href="">Sign Out</a></li>
      </ul>
    </aside>

    <section class="main-section">
    
    @if(Auth::check())
    @yield('content')
    @else
    @include('account.signin')
    @endif
    </section>
 <a class="exit-off-canvas"></a>
</div>
</div>