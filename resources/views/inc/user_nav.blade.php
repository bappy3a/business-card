<li class="menu-title">Navigation</li>
<li>
    <a href="{{ route('card.show',auth()->user()->id) }}"  class="{{ Request::is('card*') ? 'active' : '' }}">
        <i class="ion-md-speedometer"></i>  Your V-Card
    </a>
</li>
<li>
    <a target="_blank" href="{{ route('card.username',auth()->user()->card->user_name) }}">
        <i class="ion ion-md-card"></i>  View Your Card
    </a>
</li>
<li>
    <a href="{{ route('profile') }}"  class="{{ Request::is('profile*') ? 'active' : '' }}">
        <i class="ion ion-ios-contact"></i>  Profile
    </a>
</li>