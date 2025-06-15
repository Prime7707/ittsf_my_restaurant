@php
$icon_lucid = $name ?? '';
$path = base_path("public/assets/plugins/lucide-static/icons/{$icon_lucid}.svg");
$svg = file_exists($path) ? file_get_contents($path) : null;

if ($svg) {
// Extract existing class from SVG
preg_match('/class="([^"]*)"/', $svg, $classMatches);
preg_match('/stroke-width="([^"]*)"/', $svg, $strokeWidthWatches);
$originalClass = $classMatches[1] ?? '';
$originalStrokeWidth = $strokeWidthWatches[1] ?? '';

// Class
if($customClass = $attributes->get('class')){
$mergedClass = trim($originalClass . ' ' . $customClass);
$svg = preg_replace('/class="([^"]*)"/', 'class="' . $mergedClass . '"', $svg);
}

// Stroke-Width
if($customStrokeWidth = $attributes->get('stroke-width')){
$svg = preg_replace('/stroke-width="([^"]*)"/', 'stroke-width="' . $customStrokeWidth . '"', $svg);
}

// Inject all remaining attributes except class
$filteredAttributes = $attributes->except('class','stroke-width')->toHtml();

// Insert other attributes into the SVG tag
$svg = preg_replace('/^<svg\b([^>]*)>/i', '<svg$1 ' . $filteredAttributes . '>', $svg, 1);
		}
		@endphp

		@if ($svg)
		{!! $svg !!}
		@else
		<svg width="24" height="24" {{ $attributes }}></svg>
		@endif