<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>The Mandate App - Crowd Sourced Evangelism Platform</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="{{ asset('js/frontend/ie/html5shiv.js') }}"></script><![endif]-->
    <link href="{{ asset('css/frontend/main.css') }}" rel="stylesheet" type="text/css">

    <!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/frontend/ie8.css') }}" /><![endif]-->
</head>
<body class="homepage">
<div id="page-wrapper">

<!-- Header -->
<div id="header-wrapper" class="wrapper">

    <div id="header">
        <!-- Logo -->
        <div id="logo">
            <div>
                <img class="avatar border-white" src="{{ asset('img/lfc.png') }}" alt="..." height="100" width="100" />
            </div>

            <h1><a href="index.html">The Mandate App </a></h1>
            <p>A Crowd Sourced Evangelism Platform for Living Faith Church Worldwide</p>
        </div>
        <!-- Nav -->
        <nav id="nav">

            <ul>
                <li class="current"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#about-us">About</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            </ul>
        </nav>

    </div>
</div>

<!-- Intro -->
<div id="intro-wrapper" class="wrapper style1">
    <div class="title">The Introduction</div>
    <section id="intro" class="container">
        <p class="style1">So in case you were wondering what this is all about ...</p>
        <p class="style2">
            The Mandate App is a Digital Church Administration platform built upon the principles of Wonder Double Church Growth Prophetic Agenda
        </p>
        <p class="style3">It's <strong>responsive</strong>, built on <strong>the Latest Web Technologies</strong> and <strong>adept for people without smart phones or areas without internet penetration</strong>
        through readily available SMS and USSD Services. <br/>
            Project began in 2016 in Living Faith Church Ifite, Awka, Anambra state under the auspices of Pst. Superior Okpo (now R.P. at Warri Church) and brought to fruition now.
        </p>
        <ul class="actions">
            <li><a href="{{ url('register') }}" class="button style3 big">Proceed</a></li>
        </ul>
    </section>
</div>

<!-- Main -->
<div class="wrapper style2" id="about-us">
    <div class="title">The Details</div>
    <div id="main" class="container">

        <!-- Image -->
        <a href="#" class="image featured">
            <img src="{{ asset('images/pic01.jpg') }}" alt="" />
        </a>

        <!-- Features -->
        <section id="features">
            <header class="style1">
                <h2>Digital Evangelism </h2>
                <p>Effective Soul Winning and retainership through the use of digital technology for collaborative and effective follow-up</p>
            </header>
            <div class="feature-list">
                <div class="row">
                    <div class="6u 12u(mobile)">
                        <section>
                            <h3 class="icon fa-comment">Team Evangelism and Follow-up</h3>
                            <p>
                                The Mandate App allows people to form teams and members report souls won (new converts) for follow up by other team members and the church at large
                            </p>
                        </section>
                    </div>
                    <div class="6u 12u(mobile)">
                        <section>
                            <h3 class="icon fa-refresh">Instant Feedback and Follow-up</h3>
                            <p>
                                Using responsive web service and internet technologies, this system is able to send follow up messages to the new converts. These messages include messages of inspiration, encouragement and invitation to church to the new convert everyday for the next 7 days, once the details of the new convert has been inputed.
                            </p>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="12u 12u(mobile)">
                        <section>
                            <h3 class="icon fa-picture-o">Easy track of New converts faith Progression</h3>
                            <p>
                                By enabling teams of soul winners collaborate digitally on this platform, it makes for easy tracking of the progression of the faith of the new convert - from the first meeting to the first time in church till eventually joining a unit. <br/>
                                Using this collective power of a team, it makes for easy accountability of the new convert ensuring <strong>No soul is lost</strong>
                            </p>
                        </section>
                    </div>
                </div>
            </div>
            <ul class="actions actions-centered">
                <li><a href="{{ url('register') }}" class="button style1 big">Get Started</a></li>
                <li><a href="{{ url('register') }}" class="button style2 big">More Info</a></li>
            </ul>
        </section>

    </div>
</div>

<!-- Highlights -->
<div class="wrapper style3">
    <div class="title">Other Features Available </div>
    <div id="highlights" class="container">
        <div class="row 150%">
            <div class="4u 12u(mobile)">
                <section class="highlight">
                    <a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                    <h3><a href="#">Testimony</a></h3>
                    <p>
                        Allows for digital sharing of testimony. Church members can easily submit there testimonies for approval via this platform. Upon approval, it is readily available to inspire faith to the entire world
                    </p>
                    <ul class="actions">
                        <li><a href="#" class="button style1">Learn More</a></li>
                    </ul>
                </section>
            </div>
            <div class="4u 12u(mobile)">
                <section class="highlight">
                    <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                    <h3><a href="#">Announcement</a></h3>
                    <p>
                        Just incase you missed what's happening in your local church, you can always find it online. From Child dedication, marriage announcement to Job vacancies and scholarships. All announcements are made available online.
                    </p>
                    <ul class="actions">
                        <li><a href="#" class="button style1">Learn More</a></li>
                    </ul>
                </section>
            </div>
            <div class="4u 12u(mobile)">
                <section class="highlight">
                    <a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
                    <h3><a href="#">Home Cells</a></h3>
                    <p>
                        Details about each home cell, where to find them, who are there leaders, and members etc. This is most helpful especially to those who are new in town. Makes Home cell info easily accessible for effective spiritual growth.
                    </p>
                    <ul class="actions">
                        <li><a href="#" class="button style1">Learn More</a></li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div id="footer-wrapper" class="wrapper">
    <div class="title">The Rest Of It</div>
    <div id="footer" class="container">
        <header class="style1">
            <h2>The Developer: Chinonso Ani</h2>
            <p>
                A Full Stack Web Developer and Software Programmer, a Graduate of Computer Engineering from Nnamdi Azikiwe University, Awka, Anambra.
                <br/>
                The CEO of TECHAMAKA - A Tech Start-up in Abuja, with over 8 years of experience in web development, software systems and artificial intelligence.
            </p>
        </header>
        <hr />
        <div class="row 150%">
            <div class="6u 12u(mobile)">

                <!-- Contact Form -->
                <section>
                    <form method="post" action="#">
                        <div class="row 50%">
                            <div class="6u 12u(mobile)">
                                <input type="text" name="name" id="contact-name" placeholder="Name" />
                            </div>
                            <div class="6u 12u(mobile)">
                                <input type="text" name="email" id="contact-email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="row 50%">
                            <div class="12u">
                                <textarea name="message" id="contact-message" placeholder="Message" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <ul class="actions">
                                    <li><input type="submit" class="style1" value="Send" /></li>
                                    <li><input type="reset" class="style2" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>

            </div>
            <div class="6u 12u(mobile)">

                <!-- Contact -->
                <section class="feature-list small">
                    <div class="row">
                        <div class="6u 12u(mobile)">
                            <section>
                                <h3 class="icon fa-home"> Address</h3>
                                <p>
                                    Techamaka Limited<br />
                                    50 Ademola Adetokumbo<br />
                                    Wuse 2, Abuja NG
                                </p>
                            </section>
                        </div>
                        <div class="6u 12u(mobile)">
                            <section>
                                <h3 class="icon fa-comment">Social</h3>
                                <p>
                                    <a href="https://twitter.com/mykingnonso">@mykingnonso</a><br />
                                    <a href="https://twitter.com/techamaka">@techamaka</a><br />
                                    <a href="https://facebook.com/mykingnonso">facebook.com/mykingnonso</a><br />
                                    <a href="https://facebook.com/techamaka">facebook.com/techamaka</a><br />
                                </p>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="6u 12u(mobile)">
                            <section>
                                <h3 class="icon fa-envelope">Email</h3>
                                <p>
                                    <a href="mailto:me@kingnonso.com">me@kingnonso.com</a>
                                    <a href="mailto:info@techamaka.com">info@techamaka.com</a>
                                </p>
                            </section>
                        </div>
                        <div class="6u 12u(mobile)">
                            <section>
                                <h3 class="icon fa-phone">Phone</h3>
                                <p>
                                    +234 (0) 703-660-9386
                                </p>
                            </section>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <hr />
    </div>
    <div id="copyright">
        <ul>
            <li>&copy; 2018 - Built With Love for LFC World wide by <a href="www.kingnonso.com"> King Nonso</a> </li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</div>

</div>

<!-- Scripts -->

<script src="{{ asset('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>

<script src="{{ asset('js/frontend/jquery.dropotron.min.js') }}" ></script>
<script src="{{ asset('js/frontend/skel.min.js') }}" ></script>
<script src="{{ asset('js/frontend/skel-viewport.min.js') }}" ></script>
<script src="{{ asset('js/frontend/util.js') }}" ></script>
<script src="{{ asset('js/frontend/main.js') }}" ></script>

<!--[if lte IE 8]><script src="{{ asset('js/frontend/ie/respond.min.js') }}"></script><![endif]-->

</body>
</html>