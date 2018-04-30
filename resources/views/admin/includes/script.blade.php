<!-- Required Jqurey -->
  <script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tether/dist/js/tether.min.js') }}"></script>

  <!-- Required Fremwork -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- waves effects.js -->
  <script src="{{ asset('assets/plugins/Waves/waves.min.js') }}"></script>

  <!-- dataTables -->
  <script src="{{ asset('assets/plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
  {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script> --}}

  <!-- Validator -->
  <script src="{{ asset('assets/plugins/validator/validator.min.js') }}"></script>

  <!-- waves effects.js -->
  <script src="{{ asset('assets/plugins/Waves/waves.min.js') }}"></script>

  <!-- Scrollbar JS-->
  <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

  <!--classic JS-->
  <script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>

  <!-- notification -->
  <script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  <!-- Date picker.js -->
  <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

  <!-- Select 2 js -->
  <script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>

  <!-- Rickshaw Chart js -->
  {{-- <script src="{{ asset('assets/plugins/d3/d3.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/plugins/rickshaw/rickshaw.js') }}"></script> --}}

  <!-- Sparkline charts -->
  <script src="{{ asset('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

  <!-- Counter js  -->
  <script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

  <!-- custom js -->
  <script type="text/javascript" src="{{ asset('assets/js/main.min.js') }}"></script>
  <script src="{{ asset('assets/pages/notification.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/pages/elements-materialize.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ asset('assets/pages/dashboard.js') }}"></script> --}}
  <script type="text/javascript" src="{{ asset('assets/pages/elements.js') }}"></script>
  <script src="{{ asset('assets/js/menu.min.js') }}"></script>

  <script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function(){
      if ($window.scrollTop() >= 200) {
        nav.addClass('active');
      }else{
        nav.removeClass('active');
      }
    });

    function notify(title, message, from, align, icon, type, animIn, animOut){
        $.growl({
            icon: icon,
            title: title,
            message: message,
            url: ''
        },{
            element: 'body',
            type: type,
            allow_dismiss: false,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            icon_type: 'image',
            template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
        });
    };

    var from = 'top';
    var align = 'right';
    var animIn = 'animated fadeInRight';
    var animOut = 'animated fadeOutRight'; 
    var title = '';
    
    function show_notification(action, status){
      if (action == 'save') {
        
        if (status == 'success') {
          
          var message = 'Data telah berhasil disimpan'; 
          var icon = "{{ url('assets/images/success.png') }}";
          var type = 'success';
            
        }else if (status == 'failed') {
          
          var message = 'Oops! Terjadi kesalahan pada koneksi. Data gagal disimpan'; 
          var icon = "{{ url('assets/images/error.png') }}";
          var type = 'danger';
            
        }
           
      }else if (action == 'update') {
       
        if (status == 'success') {
          
          var message = 'Data telah berhasil diperbaharui'; 
          var icon = "{{ url('assets/images/success.png') }}";
          var type = 'success';
            
        }else if (status == 'failed') {
          
          var message = 'Oops! Terjadi kesalahan pada koneksi. Data gagal diperbaharui'; 
          var icon = "{{ url('assets/images/error.png') }}";
          var type = 'danger';
            
        }
            
      }else if (action == 'delete') {
        
        if (status == 'success') {
          
          var message = 'Data telah berhasil dihapus';
          var icon = "{{ url('assets/images/success.png') }}";
          var type = 'success';
            
        }else if (status == 'failed') {
          
          var message = 'Oops! Terjadi kesalahan pada koneksi. Data gagal dihapus';
          var icon = "{{ url('assets/images/error.png') }}";
          var type = 'danger';
            
        }
           
      }

      notify(title, message, from, align, icon, type, animIn, animOut);
    }

  </script>
  @if ($message = Session::get('success'))
    <script type="text/javascript">
      notify('', "{{ $message }}", 'top', 'right', "{{ url('assets/images/success.png') }}", 'success', 'animated fadeInRight', 'animated fadeOutRight');
    </script>
  @endif
  @if ($message = Session::get('error'))
    <script type="text/javascript">
      notify('', "{{ $message }}", 'top', 'right', "{{ url('assets/images/error.png') }}", 'danger', 'animated fadeInRight', 'animated fadeOutRight');
    </script>
  @endif