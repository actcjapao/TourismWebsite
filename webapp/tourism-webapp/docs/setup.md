Laravelv9 x PHPv8.2

### Steps in setting up the project


1. Creating a project: `composer create-project laravel/laravel:^9.0 example-app`
2. Setup github repository
3. Restrict artisan commands on production environment(Reference: `ProfessinalPortfolio/app/Console/Kernel.php`)
4. Setup bootstrap (use the .min files for optimization)
5. Setup bootstrap-icons (use the .min file as well)
    Steps:
    1. Download Bootstrap Icons from GitHub (The official Bootstrap Icons repository on GitHub provides the latest version of the icons:) [Link: https://github.com/twbs/icons]
    2. Extract and Organize the Files
    3. After extracting, find these files: `bootstrap-icons.css(use .min)`, `fonts` folder
    4. Move these files into your project's directory, for example:

        /your-project <br />
            │ <br />
            ├── /assets <br />
            │   └── /bootstrap-icons <br />
            │       ├──── bootstrap-icons.css <br />
            │       └──── /fonts <br />
            │                ├────── bootstrap-icons.woff <br />
            │                ├────── bootstrap-icons.woff2 <br />

    5. Link the CSS in Your HTML/Blade File
    6. Test the icons `<i class="bi bi-telephone-fill"></i>` <br />
        Documentation Link: https://icons.getbootstrap.com/ 
6. Integrate Notyf JS Library for alert framework
Follow the steps here: https://github.com/caroso1222/notyf?tab=readme-ov-file
7. Integrate DataTables that is compatible with Bootstrapv5 and above. Just localize and import these CDN files:
<!-- DataTables for Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<!-- Usage -->
<script>
    $(document).ready(function () {
        $('#usersTable').DataTable();
    });
</script>

8.