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
