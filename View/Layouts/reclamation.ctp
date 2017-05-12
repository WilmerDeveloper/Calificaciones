<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Calificación de documentos aspirantes</title>
        <?php echo $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.css'); ?>
        <?php echo $this->Html->css('/bower_components/metisMenu/dist/metisMenu.min.css'); ?>
        <?php echo $this->Html->css('/dist/css/sb-admin-2.css'); ?>
        <?php echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min.css'); ?>
        <?php echo $this->Html->css('jquery-ui.min'); ?>
        <?php echo $this->Html->css('jquery-ui.structure.min'); ?>
        <?php echo $this->Html->css('jquery-ui.theme.min'); ?>
        <?php echo $this->Html->css('bootstrap-select.min'); ?>
        <?php echo $this->Html->css('theme.bootstrap.css'); ?>
        <?php echo $this->Html->css('jquery.tablesorter.pager'); ?>
        <?php echo $this->Javascript->link('jquery'); ?>
        <?php echo $this->Javascript->link('jquery.validate'); ?>
        <?php echo $this->Javascript->link('additional-methods.min'); ?>
        <?php echo $this->Javascript->link('jquery-ui.min'); ?>
        <?php echo $this->Javascript->link('jquery.ui.datepicker-es'); ?>
        <?php echo $this->Javascript->link('/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>
        <?php echo $this->Javascript->link('/bower_components/metisMenu/dist/metisMenu.min.js'); ?>
        <?php echo $this->Javascript->link('/dist/js/sb-admin-2.js'); ?>
        <?php echo $this->Javascript->link('jquery.tablesorter'); ?>
        <?php echo $this->Javascript->link('jquery.tablesorter.widgets'); ?>
        <?php echo $this->Javascript->link('jquery.tablesorter.pager'); ?>
        <?php echo $this->Javascript->link('jquery.validate'); ?>
        <?php echo $this->Javascript->link('bootstrap-select'); ?>
    </head>
    <body>
        <script>
            $(document).ready(function () {

                // NOTE: $.tablesorter.theme.bootstrap is ALREADY INCLUDED in the jquery.tablesorter.widgets.js
                // file; it is included here to show how you can modify the default classes
                $.tablesorter.themes.bootstrap = {
                    // these classes are added to the table. To see other table classes available,
                    // look here: http://getbootstrap.com/css/#tables
                    table: 'table table-striped table-bordered table-hover',
                    caption: 'caption',
                    // header class names
                    header: 'bootstrap-header', // give the header a gradient background (theme.bootstrap_2.css)
                    sortNone: '',
                    sortAsc: '',
                    sortDesc: '',
                    active: '', // applied when column is sorted
                    hover: '', // custom css required - a defined bootstrap style may not override other classes
                    // icon class names
                    icons: '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
                    iconSortNone: 'bootstrap-icon-unsorted', // class name added to icon when column is not sorted
                    iconSortAsc: 'glyphicon glyphicon-chevron-up', // class name added to icon when column has ascending sort
                    iconSortDesc: 'glyphicon glyphicon-chevron-down', // class name added to icon when column has descending sort
                    filterRow: '', // filter row class; use widgetOptions.filter_cssFilter for the input/select element
                    footerRow: '',
                    footerCells: '',
                    even: '', // even row zebra striping
                    odd: ''  // odd row zebra striping
                };

                // call the tablesorter plugin and apply the uitheme widget
                $("table").tablesorter({
                    // this will apply the bootstrap theme if "uitheme" widget is included
                    // the widgetOptions.uitheme is no longer required to be set
                    theme: "bootstrap",
                    widthFixed: true,
                    headerTemplate: '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!

                    // widget code contained in the jquery.tablesorter.widgets.js file
                    // use the zebra stripe widget if you plan on hiding any rows (filter widget)
                    widgets: ["uitheme", "filter", "zebra"],
                    widgetOptions: {
                        // using the default zebra striping class name, so it actually isn't included in the theme variable above
                        // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
                        zebra: ["even", "odd"],
                        // reset filters button
                        filter_reset: ".reset",
                        // extra css class name (string or array) added to the filter element (input or select)
                        filter_cssFilter: "form-control",
                        // set the uitheme widget to use the bootstrap theme class names
                        // this is no longer required, if theme is set
                        // ,uitheme : "bootstrap"

                    }
                })
                        .tablesorterPager({
                            // target the pager markup - see the HTML block below
                            container: $(".ts-pager"),
                            // target the pager page select dropdown - choose a page
                            cssGoto: ".pagenum",
                            // remove rows from the table to speed up the sort of large tables.
                            // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
                            removeRows: false,
                            // output string - default is '{page}/{totalPages}';
                            // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
                            output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

                        });

            });
        </script>
        <br/>
    <center>
                   <?php echo $this->Html->image('adr.png', array('border' => "0", 'align' => 'center', 'width'=>'300')); ?>
    </center>

        <!-- /.navbar-static-side -->
        <!-- /fin del menu -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div>
        <div id="loading" style="display: none;">
                    <?php echo $this->Html->image('loading.gif', array('border' => "0", 'align' => 'center')); ?>
        </div>
        <div id="content">
                    <?php
                    $rutaArchivoSoportes = "files";
                    ?>
                    <?php
                    echo $this->Session->flash('auth');
                    echo $this->Session->flash();
                    ?>
                    <?php echo $content_for_layout; ?>
                    <?php echo $this->element('sql_dump'); ?>  
        </div>

        <!-- /#page-wrapper -->
    </div>

</body>
</html>