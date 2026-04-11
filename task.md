# Task: Stitch-Driven CMS Rebuild

Master implementation tracker for transitioning to a structured, field-driven CMS with a high-fidelity Stitch frontend.

## 🏁 Progress Summary Dashboard
- **Overall Completion**: 90%
- **Status**: ✅ Core Builder Implementation Complete
- **Current Focus**: Verification & Handover

---

## 🛠️ Implementation Checklist

### 1. Backend Core & Registry
- [x] Create `App\Services\SectionRegistry.php` define all section schemas
- [x] Implement Registry Service Provider (if needed) or simple instantiation
- [x] Map section types to fields (Text, LongText, Image, Repeater)

### 2. Layout & Global Components (Stitch Fidelity)
- [x] Refactor `resources/views/layouts/app.blade.php` to match Stitch perfectly
- [x] Refactor `resources/views/components/header.blade.php` (Dynamic Menu integration)
- [x] Refactor `resources/views/components/footer.blade.php` (Dynamic Menu integration)
- [x] Register `MenuComposer` for global access

### 3. High-Fidelity Frontend Sections
- [x] Create `frontend.sections.hero`
- [x] Create `frontend.sections.services_bento`
- [x] Create `frontend.sections.why_choose_us`
- [x] Create `frontend.sections.progress_ledger`
- [x] Create `frontend.sections.testimonials`
- [x] Create `frontend.sections.cta_banner`
- [x] Create `frontend.sections.mission_vision` (Bento)
- [x] Create `frontend.sections.team_grid`
- [x] Create `frontend.sections.pricing_cards`
- [x] Create `frontend.sections.comparison_table`
- [x] Create `frontend.sections.contact_form_panel`
- [x] Create `frontend.sections.faq_accordion`

### 4. Admin Page Builder (The "Real" CMS)
- [x] Refactor `view.admin.pages.edit` to support the visual section builder
- [x] Implement "Add Section" selector with registry types
- [x] Build **Form Partials** (Handled by form_wrapper & Registry)
- [x] Implement JS Repeater logic for complex sections (Team, Pricing, Steps)
- [x] Implement Section Visibility (`is_active`) and `sort_order` controls
- [x] Update `Admin\PageController@update` to handle structured submission

### 5. Final Module Completion & Cleanup
- [x] Fix any remaining syntax errors in existing controllers
- [x] Complete `Admin\ServiceController` CRUD views
- [x] Complete `Admin\PostController` CRUD views
- [x] Complete `Admin\MenuController` (Stitch navigation mapping)
- [x] Final Data Seeding (`DatabaseSeeder`) with real Stitch-mapped content

### 6. Verification & Handover
- [/] 1:1 Design comparison between Stitch and Frontend
- [/] Test all dynamic reordering and visibility toggles
- [x] Generate Walkthrough artifact


