<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini"><i class="tim-icons icon-sound-wave"></i></a>
            <a href="#" class="simple-text logo-normal">{{ _('StudioCentral') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'studios') class="active " @endif>
                <a href="{{ route('studios.list') }}">
                    <i class="tim-icons icon-sound-wave"></i>
                    <p>{{ _('Your Studios') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'projects') class="active " @endif>
                <a href="{{ route('projects.list') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ _('Your Projects') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'bands') class="active " @endif>
                <a href="{{ route('bands.list') }}">
                    <i class="tim-icons icon-headphones"></i>
                    <p>{{ _('Your Bands') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'chat') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ _('Chat') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'forums') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-components"></i>
                    <p>{{ _('Forums') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
