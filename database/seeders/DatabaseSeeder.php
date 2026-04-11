<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use App\Models\Category;
use App\Models\Service;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@onlinedissertationadvisors.co.uk',
            'password' => bcrypt('password'),
        ]);

        // 2. Settings
        foreach ([
            ['key' => 'site_name', 'value' => 'Online Dissertation Advisors', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'info@onlinedissertationadvisors.co.uk', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+44 123 456 7890', 'group' => 'contact'],
            ['key' => 'address', 'value' => 'London, United Kingdom', 'group' => 'contact'],
            ['key' => 'default_seo_title', 'value' => 'Expert Dissertation Writing & Editorial Services', 'group' => 'seo'],
            ['key' => 'default_seo_description', 'value' => 'Professional academic support for doctoral students.', 'group' => 'seo'],
        ] as $setting) {
            Setting::create($setting);
        }

        // 3. Menus
        $headerMenu = Menu::create(['name' => 'Header Navigation', 'location' => 'header']);
        foreach ([
            ['label' => 'Home', 'link' => '/', 'sort_order' => 1],
            ['label' => 'About Us', 'link' => '/p/about-us', 'sort_order' => 2],
            ['label' => 'Services', 'link' => '/services', 'sort_order' => 3],
            ['label' => 'Pricing', 'link' => '/p/pricing', 'sort_order' => 4],
            ['label' => 'Blog', 'link' => '/blog', 'sort_order' => 5],
            ['label' => 'Contact Us', 'link' => '/p/contact-us', 'sort_order' => 6],
        ] as $link) {
            $headerMenu->allItems()->create($link);
        }

        // 4. Categories
        $dissCat = Category::create(['name' => 'Dissertation Writing', 'slug' => 'dissertation-writing', 'type' => 'service']);
        $editCat = Category::create(['name' => 'Editing', 'slug' => 'editing', 'type' => 'service']);
        $tipCat = Category::create(['name' => 'Academic Tips', 'slug' => 'academic-tips', 'type' => 'blog']);

        // 5. Homepage Sections (Stitch-Driven)
        $home = Page::create(['title' => 'Home', 'slug' => 'home', 'is_published' => true]);
        
        $home->sections()->create([
            'type' => 'hero',
            'sort_order' => 1,
            'content' => [
                'title' => 'Elevating Research into Scholarly',
                'italic_title' => 'Art.',
                'subtitle' => 'Professional dissertation consultancy for the modern academic landscape. We transform your rigorous research into a definitive scholarly contribution.',
                'button_label' => 'Inquire for Advisory',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAoje5weV3d7jENut3ainxRhkPPeo_d58HGDxtCiiFHgDOXCoKjXdzjodgZ_GmQ6S1jLw_mJJSlY3umwwHD8dwUZdGh6KNrIR3Pg9ruQo-nKUWjdxb1dnGUFwxmd-90cUvEX26TvJ5pZ_dOwZlBx-uLr21Xk3tnIxYi47mGKkCZ0aeNzEoRSu33ALwOs6qrd3OvRRzyIkuwbSLASd2prX3JhUXVQpt4ku5gjOICfHEnCPZS-9ZDbAhmhrroAWGrBUDZ55_UM8cuRKA',
                'badge_text' => 'London Elite',
                'stat_number' => '12.5k',
                'stat_label' => 'Theses Refined'
            ]
        ]);

        $home->sections()->create([
            'type' => 'services_bento',
            'sort_order' => 2,
            'content' => [
                'heading' => 'Our Services',
                'items' => [
                    [
                        'title' => 'Dissertation Writing', 
                        'text' => 'Comprehensive support from topic selection to final conclusion. Our experts help you synthesize complex data into a cohesive narrative that meets the highest academic standards.', 
                        'icon' => 'edit_note',
                        'link_label' => 'Explore Service',
                        'link' => '/services/dissertation-writing'
                    ],
                    [
                        'title' => 'Editing & Proofreading', 
                        'text' => 'Fine-tuning your manuscript for clarity, tone, and impeccable grammar.', 
                        'icon' => 'draw',
                        'link_label' => 'Learn More',
                        'link' => '/services/editing'
                    ],
                    [
                        'title' => 'Research Proposal', 
                        'text' => 'Crafting persuasive proposals that secure committee approval and funding.', 
                        'icon' => 'biotech',
                        'link_label' => '',
                        'link' => '#'
                    ],
                    [
                        'title' => 'Assignment Help', 
                        'text' => 'Specialized assistance for complex coursework, case studies, and methodological frameworks. We help you master the material while maintaining academic integrity.', 
                        'icon' => 'assignment',
                        'button_label' => 'Priority Support',
                        'is_dark' => true,
                        'link' => '#'
                    ]
                ]
            ]
        ]);

        $home->sections()->create([
            'type' => 'why_choose_us',
            'sort_order' => 3,
            'content' => [
                'heading' => 'The Stitch Distinction.',
                'paragraph' => 'Why the worlds most ambitious scholars trust our atelier for their final contributions.',
                'items' => [
                    ['title' => 'Authority', 'description' => 'Advisors with PhDs from the worlds leading institutions.', 'icon' => 'verified'],
                    ['title' => 'Integrity', 'description' => 'Uncompromising standards of academic honesty.', 'icon' => 'gavel']
                ]
            ]
        ]);

        $home->sections()->create([
            'type' => 'progress_ledger',
            'sort_order' => 4,
            'content' => [
                'heading' => 'The Path to Doctorate.',
                'items' => [
                    ['title' => 'Strategic Brief', 'description' => 'Initial consultation to map your research goals.', 'step_number' => '01'],
                    ['title' => 'Developmental Edit', 'description' => 'Deep dive into structural and logical flow.', 'step_number' => '02'],
                    ['title' => 'Atelier Refinement', 'description' => 'Final polish and formatting for submission.', 'step_number' => '03']
                ]
            ]
        ]);

        $home->sections()->create([
            'type' => 'testimonials',
            'sort_order' => 5,
            'content' => [
                'heading' => 'Scholarly Testimonials',
                'items' => [
                    ['name' => 'Helena Vance', 'role' => 'PhD Candidate, Oxford', 'text' => 'The level of rigor and attention to detail provided by the advisors was instrumental in my successful defense.', 'rating' => '5'],
                    ['name' => 'James Thorne', 'role' => 'Assoc. Professor, LSE', 'text' => 'A true atelier for academic work. They don\'t just edit; they understand the scholarly conversation.', 'rating' => '5']
                ]
            ]
        ]);

        $home->sections()->create([
            'type' => 'cta_banner',
            'sort_order' => 6,
            'content' => [
                'heading' => 'Elevate your research to the Atelier Standard.',
                'paragraph' => 'Every masterpiece begins with a conversation. Let\'s discuss your contribution to academia.',
                'cta_primary_label' => 'Consult with an Advisor',
                'cta_secondary_label' => 'Review Portfolio'
            ]
        ]);

        // 6. About Us Page
        $about = Page::create(['title' => 'About Us', 'slug' => 'about-us', 'is_published' => true]);
        $about->sections()->create([
            'type' => 'hero_about',
            'sort_order' => 1,
            'content' => [
                'badge' => 'Since 2012',
                'title' => 'Elevating Research into',
                'title_italic' => 'Scholarly Art.',
                'subtitle' => 'We exist to bridge the gap between complex research and accessible clarity.',
                'stat_label' => 'Academic Distinction',
                'stat_text' => 'Consistently helping scholars reach the highest tiers of academic recognition.'
            ]
        ]);

        $about->sections()->create([
            'type' => 'mission_vision',
            'sort_order' => 2,
            'content' => [
                'mission_title' => 'Our Mission',
                'mission_text' => 'To empower scholars with the strategic tools and editorial precision required to leave an indelible mark.',
                'mission_tags' => 'Precision, Authority, Integrity',
                'vision_title' => 'Our Vision',
                'vision_text' => 'To become the world\'s most trusted atelier for academic excellence.',
                'vision_quote' => 'The pursuit of knowledge is a craft; we provide the studio where that craft is perfected.'
            ]
        ]);

        $about->sections()->create([
            'type' => 'team_grid',
            'sort_order' => 3,
            'content' => [
                'heading' => 'Distinguished Faculty',
                'members' => [
                    ['name' => 'Dr. Marcus Thorne', 'role' => 'Technical Editor-in-Chief', 'bio' => 'Ph.D. MIT. Expert in STEM clarity and structural integrity.'],
                    ['name' => 'Dr. Helena Vance', 'role' => 'Senior Research Strategist', 'bio' => 'Ph.D. Oxford. Specializes in qualitative methodology and societal impact.']
                ]
            ]
        ]);

        // 7. Blog & Services
        Service::create([
            'name' => 'Doctoral Dissertation Editing',
            'slug' => 'doctoral-dissertation-editing',
            'category_id' => $editCat->id,
            'short_description' => 'Comprehensive editorial support for advanced research.',
            'description' => 'Our advisors provide substantive, developmental, and copy-editing tailored to PhD standards.',
            'features' => ['Methodology Audit', 'Citation Verification', 'Logical Flow Refinement'],
            'is_published' => true
        ]);

        Post::create([
            'title' => 'Developing a Thesis Framework in the Modern Age',
            'slug' => 'thesis-framework-modern-age',
            'category_id' => $tipCat->id,
            'user_id' => 1,
            'excerpt' => 'How the modern scholar navigates the convergence of classical research methodologies and emergent AI tools.',
            'content' => 'Full research paper content goes here...',
            'is_published' => true
        ]);
    }
}
