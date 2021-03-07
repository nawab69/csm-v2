<div class="list-group">
    <a href="{{ route('app.settings.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.index') ? 'active' : ''  }}">
        General
    </a>
    <a href="{{ route('app.settings.appearance.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.appearance.index') ? 'active' : ''  }}">
        Appearance
    </a>
    <a href="{{ route('app.settings.mail.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.mail.index') ? 'active' : ''  }}">
        Mail
    </a>
    <a href="{{ route('app.settings.socialite.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.socialite.index') ? 'active' : ''  }}">
        Socialite
    </a>
    <a href="{{ route('app.settings.blockio.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.blockio.index') ? 'active' : ''  }}">
        BlockIo
    </a>
    <a href="{{ route('app.settings.fee.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.fee.index') ? 'active' : ''  }}">
        Fees
    </a>
    <a href="{{ route('app.settings.bank.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.bank.index') ? 'active' : ''  }}">
        Bank
    </a>
</div>
