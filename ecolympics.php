<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Environmental Dashboard. A technology & approach for organizations and whole communities that combines feedback, through real-time public displays of resource use and environmental conditions, with thoughts and actions of community to engage, motivate, empower & celebrate sustainable thought and action.">
    <link rel="stylesheet" href="https://environmentaldashboard.org/css/bootstrap.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/ecolympics.css?v=<?php echo time(); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=9ByOqqx0o3">
    <link rel="manifest" href="/manifest.json?v=9ByOqqx0o3">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=9ByOqqx0o3" color="#00a300">
    <link rel="shortcut icon" href="/favicon.ico?v=9ByOqqx0o3">
    <meta name="theme-color" content="#000000">
    <title>Environmental Dashboard</title>
</head>

<body>
    <div class="container">
        <?php include 'includes/header.php'; ?>
        <div class="ecolymipic-more-info-links">
            <a href="https://buildingos.com/s/oberlincity/storyboard314/?chapterId=1382" target="_blank" title="View School Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/OPSIcon.svg" alt="View School Data" srcset="">
                    <span>View School Data</span>
                </div>
            </a>
            <a href="https://buildingos.com/s/oberlincity/storyboard31413736/?chapterId=77277" target="_blank" title="View Community Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/CofOberlinIcon.svg" alt="View Community Data" srcset="">
                    <span>View Community Data</span>
                </div>
            </a>
            <a href="https://buildingos.com/reports/dashboards/282f6022666d11e7a61b525400d1fc46" target="_blank" title="View Dorms Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/OClogo.svg" alt="View Dorms Data" srcset="">
                    <span>View Dorms Data</span>
                </div>
            </a>
        </div>
        <div class="rank-data row">
            <div class="col-lg-6 col-md-12 padding-rignt-0 order-sm-2 order-lg-1">
                <div class="col-md-12 padding-rignt-0">
                    <h1>COMMUNITY VOICES</h1>
                    <iframe class="slide-show-iframe" src="//oberlin.communityhub.cloud/calendar/ecolympic" allowtransparency="true" scrolling="no" frameBorder=0 width="100%" height="470px"></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 padding-left-0 order-sm-1 order-lg-2">
                <div class="col-md-12 padding-left-0">
                    <h1>OBERLIN ECOLYMPICS 2023</h1>
                    <P>
                        <strong><i>What is it?</i></strong> Ecolympics is the Oberlin community’s annual competition to conserve water and electricity use in buildings through behavior change while celebrating the environment. The 2023 theme is “Think Global, Invest Local”. Three concurrent competitions will take place between: Oberlin City Schools; Community Buildings (Prospect Community Center, Oberlin Fire Station, the School District Office, and Oberlin Public Library); and Oberlin College Dorms. Occupants in each building work to reduce electricity and water use by the largest perentage relative to a baseline period established immediately before the competition. The highest percent reduction in each building for each resource wins!
                    </P>
                    <P>
                        <strong><i>Standings and Strategy:</i></strong> The competition standings shown below are updated in real-time throughout the competition (scroll down to see College dorms). The three buttons above are your strategic tools for winning! Click a button to see in-depth graphs of real-time electricity and water use in each participating building. Use what you learn from patterns to brainstorm on how occupants of your building can reduce water and electricity use.
                    </P>
                    <P>
                        <strong><i>Community Goals:</i></strong> While occupants of each building should work to win, a community-wide goal has been set to reduce electricity use by 10,000 kWh and water use by 10,000 gallons during the competition. The entire community wins if we meet or exceed these collective goals!
                    </P>
                </div>
            </div>
        </div>
        <div class="rank-data row mb-5">
            <div class="col-md-6 pr-0">
                <div class="col-md-12 pr-0">
                    <iframe class="first-iframe" src="https://buildingos.com/blocks/9df95b768c2347918f6e0ae8c7f72fb0/" allowtransparency="true" frameborder="0" height="430"></iframe> <!-- width="520"-->
                </div>
                <div class="col-md-12 pr-0">
                    <iframe class="second-iframe" src="https://buildingos.com/blocks/3126b38b0b574c49be350a26571b12f1/" allowtransparency="true" frameBorder=0 height="430"></iframe> <!-- width="520"-->
                </div>
                <div class="col-md-12 pr-0">
                    <iframe class="third-iframe" src="https://buildingos.com/blocks/d6105e422c9048fc816758193ca84b4f/" allowtransparency="true" frameBorder=0 height="1150"></iframe> <!-- width="1150"-->
                </div>
            </div>
            <div class="col-md-6 pl-0">
                <div class="col-md-12 pl-0">
                    <iframe class="first-iframe" src="https://buildingos.com/blocks/70efbb00d13547db9440ed062e6430ba/" allowtransparency="true" frameBorder=0 height="430"></iframe>
                </div>
                <div class="col-md-12 pl-0">
                    <iframe class="second-iframe" src="https://buildingos.com/blocks/65a6696eba8e487aaecb7885953bc483/" allowtransparency="true" frameBorder=0 height="430"></iframe>
                </div>
                <div class="col-md-12 pl-0">
                    <iframe src="https://buildingos.com/blocks/3f15739b3a594a5195b1a755d092a67d/" allowtransparency="true" scrolling="no" frameBorder=0 height="1150"></iframe> <!-- 1630 -->
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
</body>

</html>