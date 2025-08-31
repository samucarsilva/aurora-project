<?php

namespace Database\Seeders;


use App\Models\Course;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File; // Importing Facade File
use Illuminate\Support\Facades\Storage; // Importing Facade Storage


class CourseSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */

    public function run(): void
    {


        // Cleaning up the course thumbnails folder to avoid duplicates when running or seeding multiple times.

            Storage::disk('public')->deleteDirectory('course_thumbnails');
            Storage::disk('public')->makeDirectory('course_thumbnails');


        // Setting the source path for the test images.

            $sourcePath = database_path('seeders/images/courses');


        // Creating example courses to seed the database.


            $courses = [

                // Front-End Developer

                    [
                        'title' => 'Front-End Developer',
                        'description' => 'Explore the art and science of crafting the user-facing side of web applications. This course guides you through HTML5 semantics, modern CSS techniques, responsive layouts, and JavaS-cript fundamentals. You\'ll build interactive components, integrate APIs, and leverage frameworks like React or Vue to create dynamic single-page applications. With hands-on projects and code reviews, you\'ll develop a polished portfolio that highlights your creativity and technical skills.',
                        'slug' => 'front-end-developer',
                        'thumbnail_path' => 'front-end-thumbnail.png',
                    ],


                // Networking Essentials

                    [
                        'title' => 'Networking Essentials',
                        'description' => 'Uncover the principles that connect the digital world. This foundational course demystifies the OSI and TCP/IP models, IP addressing, routing, and switching. You\'ll gain a practical understanding of how data travels across local networks and the internet, learning to configure and troubleshoot basic network setups for both home and small business environments.',
                        'slug' => 'networking-essentials',
                        'thumbnail_path' => 'network-essentials-thumbnail.png',
                    ],


                // Computer Assembly

                    [
                        'title' => 'Computer Assembly',
                        'description' => 'This course takes you inside the tower, teaching you how every component works together to power modern machines. You\'ll learn to identify, install, and configure CPUs, memory modules, storage devices, motherboards, power supplies, cooling systems, and peripherals. Hands-on labs let you build real workstations from the ground up and troubleshoot common hardware failures. By the end, you\'ll feel confident disassembling and rebuilding any PC, diagnosing faults, and optimizing performance.',
                        'slug' => 'computer-assembly',
                        'thumbnail_path' => 'computer-assembly-thumbnail.png',
                    ],


                // Back-End Developer

                    [
                        'title' => 'Back-End Developer',
                        'description' => 'Become the architect of server-side logic. This course delves into building robust and scalable applications using the leading languages and technologies on the market. You\'ll master creating secure RESTful APIs, managing SQL and NoSQL databases, implementing user authentication, and deploying microservices. This course provides the skills to power complex web and mobile applications from behind the scenes.',
                        'slug' => 'back-end-developer',
                        'thumbnail_path' => 'back-end-thumbnail.png',
                    ],


                // Game Developer

                    [
                        'title' => 'Game Developer',
                        'description' => 'Bring your game ideas to life! This course guides you through the fundamentals of game creation. You will learn key concepts like game physics, 2D/3D asset integration, character animation, user input, and UI design. By the end, you will have built several small games and developed a strong foundation for a career in the gaming industry.',
                        'slug' => 'game-developer',
                        'thumbnail_path' => 'game-development-thumbnail.png',
                    ],


                // Full-Stack Developer

                    [
                        'title' => 'Full-Stack Developer',
                        'description' => 'Master the entire development lifecycle, from client to server. This comprehensive path teaches you to build complete web applications by combining front-end and back-end skills. You\'ll work with technologies like React for the user interface and Node.js/Express for the server, connect to a database like MongoDB, and learn to deploy a fully functional application, making you a versatile and in-demand developer.',
                        'slug' => 'full-stack-developer',
                        'thumbnail_path' => 'full-stack-thumbnail.png',
                    ],


                // Network Security

                    [
                        'title' => 'Network Security',
                        'description' => 'This course provides the fundamental knowledge needed to protect digital environments from common threats. You will learn the core principles of cybersecurity, including the CIA Triad (Confidentiality, Integrity, Availability), and explore how to defend against malware, phishing, and other attacks. Practical lessons cover setting up firewalls, securing Wi-Fi networks, and implementing best practices for data protection in both home and small business settings.',
                        'slug' => 'network-security',
                        'thumbnail_path' => 'network-security-thumbnail.png'
                    ],

            ];


            foreach ($courses as $courseData) {

                // Full path of the source file.

                    $sourceFile = $sourcePath . '/' . $courseData['thumbnail_path'];


                // Destination path.

                    $destinationPath = 'course_thumbnails/' . $courseData['thumbnail_path'];

                
                // Copying the file to the public storage disk.

                    if (File::exists($sourceFile)) {
                        Storage::disk('public')->put($destinationPath, File::get($sourceFile));
                    }

                
                // Create the course in the database, storing the relative path.

                    Course::create([
                        'title' => $courseData['title'],
                        'description' => $courseData['description'],
                        'slug' => $courseData['slug'],
                        'thumbnail_path' => $destinationPath,
                        'is_published' => true
                    ]);

            }

    }


}