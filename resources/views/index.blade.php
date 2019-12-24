<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/fontawesome-all.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css" /> 
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet"> 
    </head>
    <body>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="http://m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
    <body><link rel="stylesheet" href="https://demo.w3layouts.com/images/demobar_w3_4thDec2019.css">

        <section class="top_spl_courses py-md-5">
            <div class="container py-4 mt-2">
                <h3 class="tittle text-center mb-3">OUR PRODUCTS</h3>
                <div class="inner_sec_w3_agileinfo pt-4 mt-md-4">
                    <div class="tabs-grids">
                        <div id="parentVerticalTab">
                            <ul class="resp-tabs-list hor_1">
                                <li>Idea</li>
                                <li>Vision</li>
                                <li>Production</li>


                            </ul>
                            <div class="resp-tabs-container hor_1">
                                <div class="text-info">

                                    <img src="images/g1.jpg" alt=" " class="img-fluid" />

                                </div>
                                <div class="text-info">

                                    <img src="images/g2.jpg" alt=" " class="img-fluid" />

                                </div>

                                <div class="text-info">

                                    <img src="images/g3.jpg" alt=" " class="img-fluid" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.min.js"></script> 
        <script src="js/responsiveslides.min.js"></script>

        <script src="js/easyResponsiveTabs.js"></script> 
        <script type="text/javascript">
            $(document).ready(function () {

                //Vertical Tab
                $('#parentVerticalTab').easyResponsiveTabs({
                    type: 'vertical', //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true, // 100% fit in a container
                    closed: 'accordion', // Start closed if in accordion view
                    tabidentify: 'hor_1', // The tab groups identifier
                    activate: function (event) { // Callback function if tab is switched
                        var $tab = $(this);
                        var $info = $('#nested-tabInfo2');
                        var $name = $('span', $info);
                        $name.text($tab.text());
                        $info.show();
                    }
                });
            });
        </script>

    </body>
</html>