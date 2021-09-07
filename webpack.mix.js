const mix = require('laravel-mix');

mix
 //WEB
 
 
 //ADMIN
 .styles([
     'resources/views/dist/css/adminlte.min.css'
 ], 'public/backend/assets/css/adminlte.min.css')
 //Login fim
 
 .copyDirectory('resources/views/plugins/fontawesome-free','public/backend/assets/plugins/fontawesome-free')
 .copyDirectory('resources/views/plugins/icheck-bootstrap','public/backend/assets/plugins/icheck-bootstrap')
 .copyDirectory('resources/views/dist/images','public/backend/assets/images')
 
 //Login 
//    .scripts([
//        'resources/views/admin/plugins/jquery/jquery.min.js'
//    ], 'public/backend/assets/js/jquery.js')
 .copyDirectory('resources/views/plugins/jquery','public/backend/assets/plugins/jquery')
 //.copyDirectory('resources/views/admin/plugins/bs-custom-file-input','public/backend/assets/plugins/bs-custom-file-input')
    
 //.scripts([
 //    'resources/views/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'
 //], 'public/backend/assets/js/bootstrap.bundle.min.js')
 .copyDirectory('resources/views/plugins/bootstrap','public/backend/assets/plugins/bootstrap')
 
 .scripts([
     'resources/views/plugins/datatables/jquery.dataTables.min.js',
     'resources/views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
     'resources/views/plugins/datatables-responsive/js/dataTables.responsive.min.js',
     'resources/views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'
 ], 'public/backend/assets/js/datatables-lib.js')
 
 .copyDirectory('resources/views/plugins/datatables','public/backend/assets/plugins/datatables')
 .copyDirectory('resources/views/plugins/datatables-bs4','public/backend/assets/plugins/datatables-bs4')
 .copyDirectory('resources/views/plugins/datatables-responsive','public/backend/assets/plugins/datatables-responsive') 
 .copyDirectory('resources/views/plugins/chartjs','public/backend/assets/plugins/chartjs')   
 
 
 .scripts([
     'resources/views/dist/js/adminlte.min.js'
 ], 'public/backend/assets/js/adminlte.min.js')
 //Login fim
 
 
 
 .styles([
     'resources/views/plugins/jquery-tags-input/jquery.tagsinput.css'
 ], 'public/backend/assets/plugins/jquery-tags-input/jquery.tagsinput.css')
 
 .styles([
     'resources/views/dist/css/styles.css'
 ], 'public/backend/assets/css/styles.css')
 
 
 
 .copyDirectory('resources/views/plugins/moment','public/backend/assets/plugins/moment')
 .copyDirectory('resources/views/plugins/toastr','public/backend/assets/plugins/toastr')
 .copyDirectory('resources/views/plugins/inputmask','public/backend/assets/plugins/inputmask')
 
 .copyDirectory('resources/views/plugins/ekko-lightbox','public/backend/assets/plugins/ekko-lightbox')
  
 .copyDirectory('resources/views/plugins/jquery-ui','public/backend/assets/plugins/jquery-ui')    
 .copyDirectory('resources/views/plugins/chartjs','public/backend/assets/plugins/chartjs')
 .copyDirectory('resources/views/plugins/sparklines','public/backend/assets/plugins/sparklines')
 .copyDirectory('resources/views/plugins/jqvmap','public/backend/assets/plugins/jqvmap')
 .copyDirectory('resources/views/plugins/jquery-knob','public/backend/assets/plugins/jquery-knob')
 .copyDirectory('resources/views/plugins/moment','public/backend/assets/plugins/moment')
 .copyDirectory('resources/views/plugins/daterangepicker','public/backend/assets/plugins/daterangepicker')
 .copyDirectory('resources/views/plugins/tempusdominus-bootstrap-4','public/backend/assets/plugins/tempusdominus-bootstrap-4')
 .copyDirectory('resources/views/plugins/summernote','public/backend/assets/plugins/summernote')
 .copyDirectory('resources/views/plugins/overlayScrollbars','public/backend/assets/plugins/overlayScrollbars')
 .copyDirectory('resources/views/plugins/bootstrap-toggle','public/backend/assets/plugins/bootstrap-toggle')
 
 
 
 
 .scripts([
     'resources/views/dist/js/adminlte.js'
 ], 'public/backend/assets/js/adminlte.js')
 
 .scripts([        
     'resources/views/dist/js/pages/dashboard.js'
 ], 'public/backend/assets/js/dashboard.js')
 
 .scripts([        
     'resources/views/plugins/jquery-tags-input/jquery.tagsinput.js'
 ], 'public/backend/assets/plugins/jquery-tags-input/jquery.tagsinput.js')
 
 .scripts([        
     'resources/views/dist/js/jquery.mask.js'
 ], 'public/backend/assets/js/jquery.mask.js')
 
 .scripts([        
     'resources/views/dist/js/demo.js'
 ], 'public/backend/assets/js/demo.js')
 
 
 
 .scripts([
     'resources/views/dist/js/scripts.js'
 ], 'public/backend/assets/js/scripts.js')
 
 .scripts([
     'resources/views/dist/js/login.js'
 ], 'public/backend/assets/js/login.js')
 
 .options({
     processCssUrls: false
 })
 
 .version()
     
;

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
