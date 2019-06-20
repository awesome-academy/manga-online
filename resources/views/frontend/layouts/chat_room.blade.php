<!-- begin::Quick Sidebar -->
<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
    <div class="m-quick-sidebar__content">
        <span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
        <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger"
                   role="tab">@lang('frontend.chatting')</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                <chat-room v-bind:user_id="{{ session('users')->id }}"></chat-room>
            </div>
        </div>
    </div>
</div>
