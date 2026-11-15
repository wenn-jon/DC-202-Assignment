<?php

$fullName = "John Louwen Tabacon";

$course = "Bachelor of Science in Information Technology";

$school = "Mater Dei College";

$email = "johnlouwen69@gmail.com";

$phone = "09606763937";

$location = "Cogon, Inabanga, Bohol";

$photoPath = "profile.jpg";

$aboutMe = "Hello! My name is John Louwen Tabacon (wen). I am a student at Mater Dei College, pursuing a Bachelor of Science in Information Technology. I like to play games, watch anime, and edit videos in my free time. I also like to tinker with computer hardware and Operating Systems.";


$education = [
    [
        "school" => "Mater Dei College",
        "degree" => "Bachelor of Science in Information Technology",
        "year" => "2025 - Current"
    ],
    [
        "school" => "Saint Paul's Academy of Inabanga, Bohol",
        "degree" => "Senior High School",
        "year" => "2023 -2025"
    ],
];


$skills = ["Problem Solving", "Communication", "Critical Thinking", "Teamwork", "Adaptability", "Time Management", "Creativity", "Technical Skills"];


$hobbies = ["Gaming", "Anime", "Video Editing", "Tinkering with Computers", "Music"];


/**
 * Turns a list of text items into HTML <li> elements.
 * Used for the skills and hobbies lists.
 *
 * @param array $items  A list of text strings.
 * @return string       The matching <li> elements as HTML.
 */
function renderListItems($items)
{
    $html = "";

    // Go through each item and wrap it in <li> tags.
    // htmlspecialchars() keeps special characters safe on the page.
    foreach ($items as $item) {
        $html .= "<li>" . htmlspecialchars($item) . "</li>\n";
    }

    return $html;
}

/**
 * Builds one small card for each entry in the education list.
 *
 * @param array $entries  A list of education arrays (school, degree, year).
 * @return string         The education cards as HTML.
 */
function renderEducation($entries)
{
    $html = "";

    // Go through each school or degree and build a card for it.
    foreach ($entries as $entry) {
        $html .= '<div class="mini-card">';
        $html .= "<h3>" . htmlspecialchars($entry["degree"]) . "</h3>";
        $html .= "<p>" . htmlspecialchars($entry["school"]) . "</p>";
        $html .= "<span>" . htmlspecialchars($entry["year"]) . "</span>";
        $html .= "</div>\n";
    }

    return $html;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Character set and mobile scaling so the page looks right on phones -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page title shows in the browser tab -->
    <title><?php echo htmlspecialchars($fullName); ?> | Profile</title>

    <style>
        /* ---------- Colors and base styles (edit colors here) ---------- */
        :root {
            --main-color: #d9578f;
            /* Main accent color (Bocchi's hair pink) */
            --light-color: #fbe3ee;
            /* Light accent for backgrounds */
            --bg-color: #fdf4f8;
            /* Page background */
            --text-color: #2d3748;
        }

        /* Basic page settings: font, background, and text color */
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            background: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* ---------- Header and navigation bar ---------- */
        header {
            background: var(--main-color);
            color: #ffffff;
            padding: 15px 20px;
            position: sticky;
            /* Keeps the header at the top while scrolling */
            top: 0;
            z-index: 10;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* ---------- Page layout ---------- */
        .container {
            max-width: 900px;
            /* Keeps content from getting too wide */
            margin: 30px auto;
            padding: 0 20px;
        }

        /* ---------- Card style used for each section ---------- */
        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            /* Smooth hover */
        }

        /* Hover effect: the card lifts up slightly */
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        /* ---------- Section titles ---------- */
        h2 {
            color: var(--main-color);
            border-bottom: 2px solid var(--light-color);
            padding-bottom: 8px;
        }

        /* ---------- Profile photo and name ---------- */
        .profile-card {
            text-align: center;
        }

        .photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            /* Makes the photo a circle */
            object-fit: cover;
            border: 4px solid var(--main-color);
        }

        /* Shown when no photo file is found */
        .photo-placeholder {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto;
            background: var(--light-color);
            color: var(--main-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* ---------- Grid for education and contact cards ---------- */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            /* Adjusts to screen size */
            gap: 20px;
        }

        /* Small cards inside the education section */
        .mini-card {
            background: var(--bg-color);
            border-radius: 8px;
            padding: 15px;
            transition: transform 0.2s ease;
        }

        .mini-card:hover {
            transform: translateY(-3px);
            /* Hover effect */
        }

        /* ---------- Tags for skills and hobbies ---------- */
        .tag-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag-list li {
            background: var(--light-color);
            color: var(--main-color);
            padding: 6px 14px;
            border-radius: 20px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        /* Hover effect: the tag changes color */
        .tag-list li:hover {
            background: var(--main-color);
            color: #ffffff;
        }

        /* ---------- Footer ---------- */
        footer {
            text-align: center;
            padding: 20px;
            color: #718096;
        }

        /* ---------- Phones and small screens ---------- */
        @media (max-width: 600px) {
            nav a {
                display: block;
                /* Stacks the menu links on small screens */
                margin: 5px 0;
            }

            .photo,
            .photo-placeholder {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>

<body>

    <!-- ===================== HEADER ===================== -->
    <header>
        <!-- Links jump to each section of the page -->
        <nav>
            <a href="#about">About</a>
            <a href="#education">Education</a>
            <a href="#skills">Skills</a>
            <a href="#hobbies">Hobbies</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <div class="container">

        <!-- ===================== PROFILE PHOTO AND NAME ===================== -->
        <section class="card profile-card">

            <!-- Shows your photo if the file exists. Otherwise shows a placeholder box. -->
            <?php if (file_exists($photoPath)): ?>
                <img class="photo" src="<?php echo htmlspecialchars($photoPath); ?>"
                    alt="Profile photo of <?php echo htmlspecialchars($fullName); ?>">
            <?php else: ?>
                <div class="photo-placeholder">Add photo</div>
            <?php endif; ?>

            <!-- Your name, course, and school come from the variables at the top -->
            <h1><?php echo htmlspecialchars($fullName); ?></h1>
            <p><strong><?php echo htmlspecialchars($course); ?></strong></p>
            <p><?php echo htmlspecialchars($school); ?></p>
        </section>

        <!-- ===================== ABOUT ME ===================== -->
        <section class="card" id="about">
            <h2>About Me</h2>
            <p><?php echo htmlspecialchars($aboutMe); ?></p>
        </section>

        <!-- ===================== EDUCATIONAL BACKGROUND ===================== -->
        <section class="card" id="education">
            <h2>Educational Background</h2>
            <div class="grid">
                <!-- Builds one card per entry in the $education list -->
                <?php echo renderEducation($education); ?>
            </div>
        </section>

        <!-- ===================== SKILLS ===================== -->
        <section class="card" id="skills">
            <h2>Skills</h2>
            <ul class="tag-list">
                <!-- Builds one tag per entry in the $skills list -->
                <?php echo renderListItems($skills); ?>
            </ul>
        </section>

        <!-- ===================== HOBBIES AND INTERESTS ===================== -->
        <section class="card" id="hobbies">
            <h2>Hobbies and Interests</h2>
            <ul class="tag-list">
                <!-- Builds one tag per entry in the $hobbies list -->
                <?php echo renderListItems($hobbies); ?>
            </ul>
        </section>

        <!-- ===================== CONTACT INFORMATION ===================== -->
        <section class="card" id="contact">
            <h2>Contact Information</h2>
            <div class="grid">
                <!-- mailto: opens the visitor's email app -->
                <div class="mini-card">
                    <h3>Email</h3>
                    <p><a
                            href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
                    </p>
                </div>
                <div class="mini-card">
                    <h3>Phone</h3>
                    <p><?php echo htmlspecialchars($phone); ?></p>
                </div>
                <div class="mini-card">
                    <h3>Location</h3>
                    <p><?php echo htmlspecialchars($location); ?></p>
                </div>
            </div>
        </section>

    </div>

    <!-- ===================== FOOTER ===================== -->
    <footer>
        <!-- date("Y") prints the current year automatically -->
        <p>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($fullName); ?>. All rights reserved.</p>
    </footer>

</body>

</html>