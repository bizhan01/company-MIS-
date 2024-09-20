@if(auth()->user()->isAdmin == 1)
      @include('admin.adminDashboard')
  @elseif(auth()->user()->isAdmin == 2)
        @include('registrar.registrarDashboard')
      @else
            @include('finance.financeDashboard')
      @endif
