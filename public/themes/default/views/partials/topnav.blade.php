<?php
    function sa($item){
        if(URL::to($item) == URL::full() ){
            return  'class="active"';
        }else{
            return '';
        }
    }
?>
<ul class="nav">
    @if(Auth::check())

        <li><a href="{{ URL::to('submission') }}" {{ sa('submission') }} >Submission</a></li>

        @if(Auth::user()->role == 'root' || Auth::user()->role == 'admin')
        <li><a href="{{ URL::to('music') }}" {{ sa('music') }} >Music</a></li>
        <li><a href="{{ URL::to('video') }}" {{ sa('video') }} >Video</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Transactions
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::to('download') }}" {{ sa('download') }} >Download</a></li>
                <li><a href="{{ URL::to('purchase') }}" {{ sa('purchase') }} >Purchase</a></li>
                <li><a href="{{ URL::to('subscription') }}" {{ sa('subscription') }} >Subscription</a></li>
                <li><a href="{{ URL::to('payment') }}" {{ sa('payment') }} >Payment</a></li>
            </ul>
        </li>
        {{--

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Publication
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::to('campaign') }}" {{ sa('campaign') }} >Campaign</a></li>
                <li><a href="{{ URL::to('newsletter') }}" {{ sa('newsletter') }} >Newsletter</a></li>
                <li><a href="{{ URL::to('brochure') }}" {{ sa('brochure') }} >Brochure</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Buyers
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::to('buyer') }}" {{ sa('buyer') }} >Contact List</a></li>
                <li><a href="{{ URL::to('contactgroup') }}" {{ sa('contactgroup') }} >Contact Groups</a></li>
            </ul>
        </li>

        <li><a href="{{ URL::to('event') }}" {{ sa('event') }} >Events</a></li>
        <li><a href="{{ URL::to('promocode') }}" {{ sa('promocode') }} >Promo Code</a></li>

        --}}
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Media Management
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::to('genre') }}" {{ sa('genre') }} >Genres</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Reports
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::to('downloadreport') }}" {{ sa('downloadreport') }} >Download</a></li>
                <li><a href="{{ URL::to('activity') }}" {{ sa('activity') }} >Activity Log</a></li>
                <li><a href="{{ URL::to('access') }}" {{ sa('access') }} >Site Access</a></li>
            </ul>
        </li>
        @endif
        @if(Auth::user()->role == 'root' || Auth::user()->role == 'admin' || Auth::user()->role == 'editor')
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Site Content
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::to('content/pages') }}" {{ sa('content/pages') }} >Pages</a></li>
                <li><a href="{{ URL::to('content/posts') }}" {{ sa('content/posts') }} >Posts</a></li>
                <li><a href="{{ URL::to('content/category') }}" {{ sa('content/category') }} >Category</a></li>
                <li><a href="{{ URL::to('content/menu') }}" {{ sa('content/menu') }} >Menu</a></li>
                <li><a href="{{ URL::to('homeslide') }}" {{ sa('homeslide') }} >Home Page</a></li>
                <li><a href="{{ URL::to('showcase') }}" {{ sa('showcase') }} >Showcases</a></li>
                <li><a href="{{ URL::to('homeslide') }}" {{ sa('homeslide') }} >Home Slide Show</a></li>
                <li><a href="{{ URL::to('faq') }}" {{ sa('faq') }} >FAQ Entries</a></li>
                <li><a href="{{ URL::to('faqcat') }}" {{ sa('faqcat') }} >FAQ Category</a></li>
                <li><a href="{{ URL::to('glossary') }}" {{ sa('glossary') }} >Glossary Entries</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                System
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu">
                <li><a href="{{ URL::to('user') }}" {{ sa('user') }} >Admins</a></li>
                <li><a href="{{ URL::to('option') }}" {{ sa('option') }} >Options</a></li>
            </ul>
        </li>
        @endif
    @endif
</ul>
