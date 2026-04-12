<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$cat = App\Models\Category::where('name', 'Dissertation Writing')->first();
if ($cat) {
    echo "Category: " . $cat->name . "\n";
    echo "Count from Relation: " . $cat->services()->count() . "\n";
    echo "Published Count: " . $cat->services()->where('is_published', true)->count() . "\n";
    foreach($cat->services as $s) {
        echo " - " . $s->name . " | Published: " . ($s->is_published?'Yes':'No') . "\n";
    }
}
