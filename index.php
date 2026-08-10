<?php
// PHP Form Handling Logic
$msg_status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    if(!empty($name) && !empty($email) && !empty($message)) {
        $msg_status = "success";
    } else {
        $msg_status = "error";
    }
}

// Portfolio Core Data
$portfolio = [
    "name" => "Mohit Gochar",
    "titles" => ["MCA Student", "DevOps & Cloud Practitioner", "Full-Stack & Tech Solutions Creator"],
    "location" => "Kota, Rajasthan, India",
    "email" => "mohitgocher4848@gmail.com",
    "bio" => "Dynamic MCA professional driven by the passion for building scalable software solutions, containerized DevOps pipelines, AWS cloud environments, and data-driven systems. Adept at bridging complex technical architectures with real-world business growth and infrastructure automation.",
    
    "stats" => [
        ["label" => "Projects Built", "value" => "10+"],
        ["label" => "Core Stack", "value" => "Docker, AWS & K8s"],
        ["label" => "Business Deployments", "value" => "CCTV & IT Ops"],
        ["label" => "Active Clients", "value" => "Agency Scale"]
    ],

    "timeline" => [
        [
            "year" => "Present",
            "role" => "Master of Computer Applications (MCA)",
            "org" => "Modi Institute of Management & Technology, Kota",
            "desc" => "Pursuing advanced computing studies alongside specialized offline training in DevOps, AWS, Kubernetes, and Data Science with Python."
        ],
        [
            "year" => "Active",
            "role" => "Tech Infrastructure & CCTV Operations",
            "org" => "Independent Business Setup",
            "desc" => "Managing end-to-end client deployment, hardware security systems, IP cameras, and infrastructure optimization."
        ],
        [
            "year" => "Ongoing",
            "role" => "Digital Marketing & Brand Strategy",
            "org" => "Agency Operations & Rankerrs Classes (Jaipur)",
            "desc" => "Executing high-converting ad scripts, social media growth campaigns, and online brand scaling."
        ]
    ],

    "skills" => [
        [
            "icon" => "fa-box-archive", 
            "title" => "Docker & Containerization", 
            "desc" => "Building container images, multi-stage builds, Docker Compose, and environment isolation."
        ],
        [
            "icon" => "fa-cloud", 
            "title" => "AWS Cloud Infrastructure", 
            "desc" => "Cloud computing, EC2 instance management, S3 storage buckets, IAM security, and scalable deployments."
        ],
        [
            "icon" => "fa-dharmachakra", 
            "title" => "Kubernetes Orchestration", 
            "desc" => "Cluster management, pods, deployments, scaling, and automated container orchestration."
        ],
        [
            "icon" => "fa-code", 
            "title" => "Core Programming & Python", 
            "desc" => "Python, Data Science libraries, PHP scripting, JavaScript, and backend logic."
        ],
        [
            "icon" => "fa-network-wired", 
            "title" => "Hardware & CCTV Security", 
            "desc" => "CCTV infrastructure deployment, network troubleshooting, and hardware maintenance."
        ],
        [
            "icon" => "fa-chart-line", 
            "title" => "Digital Growth & Marketing", 
            "desc" => "Targeted ad copywriting, performance marketing, and business brand amplification."
        ]
    ],

    "projects" => [
        [
            "title" => "Cloud-Native Docker & K8s Pipeline",
            "desc" => "Engineered automated containerized deployments using Docker containers and Kubernetes clusters for high availability.",
            "tech" => "Docker • Kubernetes • AWS",
            "badge" => "DevOps Cloud"
        ],
        [
            "title" => "Python & Data Science Core Engine",
            "desc" => "Designed analytical data processing models and automation scripts as part of advanced technical training.",
            "tech" => "Python • Pandas • Analytics",
            "badge" => "Academic / Dev"
        ],
        [
            "title" => "Enterprise CCTV & Surveillance Setup",
            "desc" => "Managed full lifecycle deployment, hardware configuration, and client-side operations for high-security networks.",
            "tech" => "Hardware • Security • Networking",
            "badge" => "Infrastructure"
        ],
        [
            "title" => "Digital Marketing Growth Suite",
            "desc" => "Engineered targeted ad scripts and promotional scale strategies for expanding client brands.",
            "tech" => "Growth Hack • Branding • Ads",
            "badge" => "Marketing Tech"
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $portfolio['name']; ?> | DevOps & Tech Portfolio</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS Library for Smooth Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        deepbg: '#030712',
                        cardbg: 'rgba(11, 15, 25, 0.75)',
                        neoncyan: '#06b6d4',
                        neonblue: '#3b82f6'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #030712;
            color: #f3f4f6;
            font-family: system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
            margin: 0;
        }
        /* Live Wallpaper Background Canvas */
        #live-wallpaper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            pointer-events: none;
        }
        .glow-box {
            box-shadow: 0 0 35px -10px rgba(6, 182, 212, 0.2);
            backdrop-filter: blur(12px);
        }
        .glow-box:hover {
            box-shadow: 0 0 45px -5px rgba(6, 182, 212, 0.4);
        }
        .glass-nav {
            background: rgba(3, 7, 18, 0.8);
            backdrop-filter: blur(16px);
        }
        .glass-card {
            background: rgba(11, 15, 25, 0.8);
            backdrop-filter: blur(12px);
        }
        .typing-cursor::after {
            content: '|';
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
    </style>
</head>
<body class="selection:bg-neoncyan selection:text-deepbg">

    <!-- Live Interactive Wallpaper Background Canvas -->
    <canvas id="live-wallpaper"></canvas>

    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full z-50 glass-nav border-b border-slate-800/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="#" class="text-xl font-black tracking-wider text-neoncyan flex items-center gap-2.5">
                <i class="fa-solid fa-terminal animate-pulse"></i> 
                <span><?php echo $portfolio['name']; ?></span>
            </a>
            
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-300">
                <a href="#about" class="hover:text-neoncyan transition duration-200">About</a>
                <a href="#timeline" class="hover:text-neoncyan transition duration-200">Journey</a>
                <a href="#skills" class="hover:text-neoncyan transition duration-200">Tech Stack</a>
                <a href="#projects" class="hover:text-neoncyan transition duration-200">Projects</a>
                <a href="#contact" class="hover:text-neoncyan transition duration-200">Contact</a>
            </nav>

            <a href="#contact" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 text-xs font-bold uppercase tracking-wider bg-gradient-to-r from-neoncyan to-neonblue text-deepbg rounded-xl hover:opacity-90 transition duration-300 shadow-lg shadow-cyan-500/20">
                <i class="fa-solid fa-paper-plane"></i> Let's Connect
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center pt-28 pb-20 px-6 relative">
        <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in" data-aos-duration="1000">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 mb-6 text-xs font-semibold bg-neoncyan/10 text-neoncyan rounded-full border border-neoncyan/20 backdrop-blur-md">
                <span class="w-2 h-2 rounded-full bg-neoncyan animate-ping"></span>
                System Operational • Docker, AWS & K8s Enabled
            </div>
            
            <h1 class="text-4xl sm:text-7xl font-black tracking-tight mb-6 leading-tight">
                Engineering <span class="text-transparent bg-clip-text bg-gradient-to-r from-neoncyan via-cyan-300 to-neonblue">Cloud Infrastructures</span>
            </h1>
            
            <p class="text-lg sm:text-2xl text-slate-300 font-medium mb-10 max-w-2xl mx-auto">
                <span id="typed-text" class="text-neoncyan font-semibold"></span><span class="typing-cursor"></span>
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#projects" class="px-8 py-4 bg-neoncyan text-deepbg font-extrabold rounded-2xl hover:bg-cyan-400 transition duration-300 shadow-xl shadow-cyan-500/30 flex items-center gap-3 transform hover:-translate-y-1">
                    <i class="fa-solid fa-code-branch"></i> Explore Systems
                </a>
                <a href="#contact" class="px-8 py-4 glass-card border border-slate-800 text-slate-200 font-extrabold rounded-2xl hover:border-neoncyan/50 transition duration-300 flex items-center gap-3 transform hover:-translate-y-1">
                    <i class="fa-solid fa-envelope-open-text"></i> Get in Touch
                </a>
            </div>

            <!-- Stats Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-20" data-aos="fade-up" data-aos-delay="200">
                <?php foreach($portfolio['stats'] as $stat): ?>
                <div class="glass-card border border-slate-800/80 p-5 rounded-2xl shadow-lg">
                    <h3 class="text-2xl sm:text-3xl font-black text-neoncyan mb-1"><?php echo $stat['value']; ?></h3>
                    <p class="text-xs text-slate-400 font-medium uppercase tracking-wider"><?php echo $stat['label']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-28 px-6 border-y border-slate-900/80">
        <div class="max-w-4xl mx-auto" data-aos="fade-up">
            <div class="text-center mb-16">
                <span class="text-xs font-bold text-neoncyan tracking-widest uppercase">Background Overview</span>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight mt-2">About Me</h2>
                <div class="w-12 h-1 bg-neoncyan mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="glass-card border border-slate-800 rounded-3xl p-8 sm:p-12 glow-box transition duration-500">
                <p class="text-slate-300 text-lg sm:text-xl leading-relaxed text-center font-normal">
                    <?php echo $portfolio['bio']; ?>
                </p>
                
                <div class="mt-8 pt-8 border-t border-slate-800/80 flex flex-wrap justify-center gap-6 text-sm text-slate-400">
                    <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-neoncyan"></i> <?php echo $portfolio['location']; ?></div>
                    <div class="flex items-center gap-2"><i class="fa-solid fa-graduation-cap text-neoncyan"></i> MCA Degree Program</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience & Education Timeline Section -->
    <section id="timeline" class="py-28 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-xs font-bold text-neoncyan tracking-widest uppercase">Roadmap</span>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight mt-2">Education & Professional Journey</h2>
                <div class="w-12 h-1 bg-neoncyan mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="space-y-8 relative before:absolute before:inset-0 before:left-7 before:w-0.5 before:bg-slate-800">
                <?php foreach($portfolio['timeline'] as $index => $item): ?>
                <div class="relative flex items-start gap-6 group" data-aos="fade-up" data-aos-delay="<?php echo $index * 150; ?>">
                    <div class="w-14 h-14 rounded-2xl glass-card border border-slate-800 flex items-center justify-center text-neoncyan text-lg font-bold shrink-0 z-10 group-hover:border-neoncyan transition">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div class="glass-card border border-slate-800 rounded-2xl p-6 sm:p-8 w-full hover:border-neoncyan/50 transition duration-300 shadow-xl">
                        <span class="inline-block px-3 py-1 mb-3 text-xs font-mono font-bold bg-cyan-950 text-cyan-300 rounded-full border border-cyan-800/50"><?php echo $item['year']; ?></span>
                        <h3 class="text-xl font-bold text-white mb-1"><?php echo $item['role']; ?></h3>
                        <p class="text-sm font-semibold text-neoncyan mb-3"><?php echo $item['org']; ?></p>
                        <p class="text-slate-400 text-sm leading-relaxed"><?php echo $item['desc']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tech Stack Section (Docker, AWS, K8s Included) -->
    <section id="skills" class="py-28 px-6 border-y border-slate-900/80">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-xs font-bold text-neoncyan tracking-widest uppercase">Competencies</span>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight mt-2">Tech Stack & Infrastructure</h2>
                <div class="w-12 h-1 bg-neoncyan mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($portfolio['skills'] as $index => $skill): ?>
                <div class="glass-card border border-slate-800 rounded-2xl p-8 hover:border-neoncyan/50 transition duration-300 transform hover:-translate-y-2 group shadow-xl" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="w-14 h-14 rounded-xl bg-neoncyan/10 flex items-center justify-center text-neoncyan text-2xl mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid <?php echo $skill['icon']; ?>"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white"><?php echo $skill['title']; ?></h3>
                    <p class="text-slate-400 text-sm leading-relaxed"><?php echo $skill['desc']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-28 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-xs font-bold text-neoncyan tracking-widest uppercase">Portfolio Showcase</span>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight mt-2">Featured Projects & Businesses</h2>
                <div class="w-12 h-1 bg-neoncyan mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <?php foreach($portfolio['projects'] as $index => $proj): ?>
                <div class="glass-card border border-slate-800 rounded-3xl p-8 sm:p-10 flex flex-col justify-between hover:border-neoncyan/50 transition duration-300 group shadow-xl" data-aos="fade-up" data-aos-delay="<?php echo $index * 150; ?>">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold px-3 py-1 bg-cyan-950 text-cyan-300 rounded-full border border-cyan-800/50"><?php echo $proj['badge']; ?></span>
                            <i class="fa-solid fa-arrow-up-right-from-square text-slate-500 group-hover:text-neoncyan transition"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 text-white group-hover:text-neoncyan transition"><?php echo $proj['title']; ?></h3>
                        <p class="text-slate-400 text-base leading-relaxed mb-6"><?php echo $proj['desc']; ?></p>
                    </div>
                    <div>
                        <span class="inline-block text-xs font-mono text-slate-300 bg-slate-900 px-3.5 py-2 rounded-xl border border-slate-800"><?php echo $proj['tech']; ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section with PHP Form -->
    <section id="contact" class="py-28 px-6 border-t border-slate-900/80">
        <div class="max-w-4xl mx-auto" data-aos="zoom-in">
            <div class="text-center mb-16">
                <span class="text-xs font-bold text-neoncyan tracking-widest uppercase">Get in Touch</span>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight mt-2">Let's Build Something Powerful</h2>
                <div class="w-12 h-1 bg-neoncyan mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="glass-card border border-slate-800 rounded-3xl p-8 sm:p-12 glow-box shadow-2xl">
                <?php if($msg_status == "success"): ?>
                    <div class="mb-8 p-4 bg-emerald-950/50 border border-emerald-500/30 text-emerald-300 rounded-2xl text-center font-medium">
                        <i class="fa-solid fa-circle-check mr-2"></i> Message sent successfully! I will get back to you soon.
                    </div>
                <?php elseif($msg_status == "error"): ?>
                    <div class="mb-8 p-4 bg-rose-950/50 border border-rose-500/30 text-rose-300 rounded-2xl text-center font-medium">
                        <i class="fa-solid fa-triangle-exclamation mr-2"></i> Please fill in all fields before submitting.
                    </div>
                <?php endif; ?>

                <form action="#contact" method="POST" class="space-y-6">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Your Name</label>
                            <input type="text" name="name" required class="w-full bg-slate-900/80 border border-slate-800 rounded-xl px-4 py-3.5 text-slate-100 focus:outline-none focus:border-neoncyan transition" placeholder="Enter your name">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Your Email</label>
                            <input type="email" name="email" required class="w-full bg-slate-900/80 border border-slate-800 rounded-xl px-4 py-3.5 text-slate-100 focus:outline-none focus:border-neoncyan transition" placeholder="Enter your email">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Your Message</label>
                        <textarea name="message" rows="4" required class="w-full bg-slate-900/80 border border-slate-800 rounded-xl px-4 py-3.5 text-slate-100 focus:outline-none focus:border-neoncyan transition" placeholder="Write your message or project details..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-8 py-4 bg-neoncyan text-deepbg font-extrabold rounded-xl hover:bg-cyan-400 transition shadow-xl shadow-cyan-500/20 w-full sm:w-auto">
                            Send Message <i class="fa-solid fa-paper-plane ml-2"></i>
                        </button>
                    </div>
                </form>

                <div class="mt-12 pt-8 border-t border-slate-800 text-center">
                    <p class="text-sm text-slate-400 mb-2">Or reach out directly via email:</p>
                    <a href="mailto:<?php echo $portfolio['email']; ?>" class="text-base font-bold text-neoncyan hover:underline"><?php echo $portfolio['email']; ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 border-t border-slate-900 text-center text-xs text-slate-500 bg-deepbg">
        <p>&copy; <?php echo date('Y'); ?> <span class="text-slate-300 font-semibold"><?php echo $portfolio['name']; ?></span>. Engineered for performance.</p>
    </footer>

    <!-- AOS, Typing & Live Wallpaper Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 100 });

        // JavaScript Typing Effect for Hero
        const titles = <?php echo json_encode($portfolio['titles']); ?>;
        let count = 0;
        let index = 0;
        let currentText = '';
        let letter = '';

        (function type() {
            if (count === titles.length) {
                count = 0;
            }
            currentText = titles[count];
            letter = currentText.slice(0, ++index);

            document.getElementById('typed-text').textContent = letter;
            if (letter.length === currentText.length) {
                count++;
                index = 0;
                setTimeout(type, 2000);
            } else {
                setTimeout(type, 100);
            }
        }());

        // Live Wallpaper Canvas Background Script (Reacts to Scroll & Time)
        const canvas = document.getElementById('live-wallpaper');
        const ctx = canvas.getContext('2d');

        let width, height;
        let particles = [];
        let scrollOffset = 0;

        function resize() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resize);
        resize();

        window.addEventListener('scroll', () => {
            scrollOffset = window.scrollY * 0.15;
        });

        class Particle {
            constructor() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * 1.2;
                this.vy = (Math.random() - 0.5) * 1.2;
                this.radius = Math.random() * 2 + 1;
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;

                if (this.x < 0) this.x = width;
                if (this.x > width) this.x = 0;
                if (this.y < 0) this.y = height;
                if (this.y > height) this.y = 0;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y - (scrollOffset % height), this.radius, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(6, 182, 212, 0.45)';
                ctx.fill();
            }
        }

        for (let i = 0; i < Math.floor(window.innerWidth / 15); i++) {
            particles.push(new Particle());
        }

        function animateWallpaper() {
            ctx.clearRect(0, 0, width, height);
            
            // Draw gradient background grid lines
            ctx.strokeStyle = 'rgba(59, 130, 246, 0.03)';
            ctx.lineWidth = 1;
            let gridSize = 60;
            let offset = (scrollOffset * 0.5) % gridSize;

            for (let x = 0; x < width; x += gridSize) {
                ctx.beginPath();
                ctx.moveTo(x, 0);
                ctx.lineTo(x, height);
                ctx.stroke();
            }
            for (let y = offset; y < height; y += gridSize) {
                ctx.beginPath();
                ctx.moveTo(0, y);
                ctx.lineTo(width, y);
                ctx.stroke();
            }

            // Update & Connect Particles
            particles.forEach((p, index) => {
                p.update();
                p.draw();

                for (let j = index + 1; j < particles.length; j++) {
                    let p2 = particles[j];
                    let dist = Math.hypot(p.x - p2.x, p.y - p2.y);
                    if (dist < 120) {
                        ctx.strokeStyle = `rgba(6, 182, 212, ${0.15 * (1 - dist / 120)})`;
                        ctx.lineWidth = 0.8;
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y - (scrollOffset % height));
                        ctx.lineTo(p2.x, p2.y - (scrollOffset % height));
                        ctx.stroke();
                    }
                }
            });

            requestAnimationFrame(animateWallpaper);
        }

        animateWallpaper();
    </script>
</body>
</html>
