<!doctype html>
<html lang="en">

<head>
    <meta name="description" content="Environmental Dashboard. A technology & approach for organizations and whole communities that combines feedback, through real-time public displays of resource use and environmental conditions, with thoughts and actions of community to engage, motivate, empower & celebrate sustainable thought and action.">
    <?php include 'includes/html-head.php'; ?>
    <script type="module" crossorigin src="https://config.communityhub.cloud/embed-plugins/ecolympic/ecolympic-index.js?v=1.0"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container resizable-element">
        <div class="ecolymipic-more-info-links">
            <a href="https://oberlin.communityhub.cloud/dh-public/ops-embed?active-page=exploreData" target="_blank" title="View School Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/OPSIcon.svg" alt="View School Data" srcset="">
                    <span>View School Data</span>
                </div>
            </a>
            <a href="https://oberlin.communityhub.cloud/dh-public/city-of-oberlin?active-page=exploreData" target="_blank" title="View Community Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/CofOberlinIcon.svg" alt="View Community Data" srcset="">
                    <span>View Community Data</span>
                </div>
            </a>
            <a href="https://oberlin.communityhub.cloud/dh-public/oc-embed?active-page=exploreData" target="_blank" title="View Oberlin College Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/OClogo.svg" alt="View Oberlin College Data" srcset="">
                    <span>View Oberlin College Data</span>
                </div>
            </a>
        </div>
        <div class="col-md-12 padding-left-0 order-sm-1 order-lg-2 text-center">
            <h1>OBERLIN ECOLYMPICS 2025</h1>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 padding-rignt-0 order-sm-2 order-lg-1">
                <div class="col-md-12 pr-lg-0">
                    <div class="slide-show-container">
                        <ecolympic-tabs-plugin />
                    </div>
                    <!-- <iframe class="slide-show-iframe" src="http://oberlin.communityhub.local:9001/calendar/ecolympic" allowtransparency="true" scrolling="no" frameBorder=0 width="100%" height="470px"></iframe> -->
                </div>
                <div class="col-md-12 pr-0 my-2">
                    <div class="content-status">
                        <div class="d-block">
                            <em class="h6 text-black text-italic">
                                Follow on social media
                            </em>
                        </div>
                        <div class="text-center d-inline-flex justify-content-center align-items-center py-1 px-1 pb-4 social-btn-container">
                            <?php include 'includes/social-media-links.php'; ?>
                        </div>
                        <div class="standings-container">
                            <div class="d-block">
                                <strong class="h4 text-black">
                                    CURRENT STANDINGS WILL BE SHOWN AFTER 2025 COMPETION BEGINS
                                </strong>
                            </div>
                            <!-- <div class="d-block">
                                <strong class="h6 text-black">
                                    (2025 will be posted when competition begins)
                                </strong>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 padding-left-0 order-sm-1 order-lg-2">
                <div class="col-md-12 pl-lg-0 about-ecolympic text-justify">
                    <P>
                        <strong><i>What is it?</i></strong> Ecolympics is the Oberlin community’s annual competition to conserve water and electricity use in buildings through behavior change while celebrating the environment. The 2025 competition will emphasize all the ways that the City of Oberlin, Oberlin City Schools, Oberlin College and other organizations and community members are taking local action to bring about positive global change.
                    </P>
                    <P>
                        <strong><i>Who is competing?</i></strong> Four concurrent competitions will take place among: Oberlin City Schools; Community Buildings (Oberlin Community Center, Oberlin Fire Station, the School District Office, and Oberlin Public Library); Oberlin College Residential Houses (Dorms); and Oberlin College Buildings (Cox, Admissions, and Wilder). Occupants in each building will work to reduce electricity and water use by the largest percentage relative to a baseline period established immediately before the competition. Buildings with the highest percent reduction in each group for each resource win!
                    </P>
                    <P>
                        <strong><i>Standings and Strategy:</i></strong> During the competition, standings shown below are updated in real-time (scroll down to see College dorms). The three buttons above link to strategy tools for winning! Click to see in-depth graphs of real-time electricity and water use in each participating building. Use what you learn from patterns to brainstorm on how occupants of your building can reduce water and electricity use!
                    </P>
                    <P class="m-0">
                        <strong><i>Community Goals:</i></strong> While occupants of each building should work to win, a community-wide goal has been set to reduce electricity use by 10,000 kWh and water use by 10,000 gallons during the competition. The entire community wins if we meet or exceed these collective goals!
                    </P>
                </div>
            </div>
        </div>
        <div class="rank-data row mb-5">
            <!-- Ecolympics 2025 Oberlin City Schools  -->
            <div class="col-md-12 mb-1 pl-4">
                <img class="img-thumbnail" src="https://storage.googleapis.com/ch-digital-signage/oberlin/digital-signage/oberlin-city-schools-winners.png" />
            </div>
            <div class="col-md-12 mb-1 pl-4">
                <img class="img-thumbnail" src="https://storage.googleapis.com/ch-digital-signage/oberlin/digital-signage/commuinity-buildings-winners.png" />
            </div>
            <div class="col-md-12 mb-1 pl-4">
                <img class="img-thumbnail" src="https://storage.googleapis.com/ch-digital-signage/oberlin/digital-signage/community-wide-savings.png" />
            </div>
            <!-- Ecolympics 2025 Community Buildings  -->
            <div class="col-md-12 mb-1 pl-4">
                <img class="img-thumbnail" src="https://storage.googleapis.com/ch-digital-signage/oberlin/digital-signage/city-school-savings.png" />
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
    <?php include 'includes/resize-obersavable.js.php'; ?>
    <script>
        try {
            /* "#environmentaldashboard-ecolympics" */
            elementResizeObserver('body')
        } catch (error) {
            console.log(error);
        }
    </script>
</body>

</html>