

<div class="tutorial-container">
    
<nav class="tutorial-sidebar" id="mySidebar">
    <div class="sidebar-header">{{ $technology->name }} Tutorial</div> @foreach ($technology->sections as $section) <div> <!-- Section Header (Button) --> <button onclick="toggleAccordion('acc-{{ $section->id }}')" class="tutorial-btn"> {{ $section->title }} <i class="fa fa-caret-down"></i> </button> <!-- Section Concepts (Accordion Body) -->
        <div id="acc-{{ $section->id }}" class="tutorial-accordion-body"> <!-- Link to show Section Content --> <a href="javascript:void(0)" onclick="showContent('section-{{ $section->id }}')" class="tutorial-btn sub-item"> <b>{{ $section->title }} (Overview)</b> </a> @foreach ($section->concepts as $concept) <a href="javascript:void(0)" onclick="showContent('concept-{{ $concept->id }}')" class="tutorial-btn sub-item"> {{ $concept->name }} </a> @endforeach </div>
    </div> @endforeach
</nav> <!-- Main Content -->
<div class="tutorial-main"> <!-- Default Welcome Message -->
    <div id="default-welcome" class="content-block" style="display:block">
        <h1>{{ $technology->name }}</h1>
        <p>{{ $technology->description ?? 'No description available.' }}</p>
        <hr>
        <p>Select a topic from the menu to learn.</p>
    </div> <!-- Sections Content --> @foreach ($technology->sections as $section) <div id="section-{{ $section->id }}" class="content-block" style="display:none">
        <h1>{{ $section->title }}</h1> @if($section->content) <div class="w3-panel"> {!! $section->content !!} </div> @endif
    </div> @endforeach <!-- Concepts Content --> @foreach ($technology->sections as $section) @foreach ($section->concepts as $concept) <div id="concept-{{ $concept->id }}" class="content-block" style="display:none">
        <h1>{{ $concept->name }}</h1> @if($concept->description) <p>{{ $concept->description }}</p> @endif @if($concept->syntax) <div class="code-panel">
            <h4>Syntax</h4>
            <pre>{{ $concept->syntax }}</pre>
        </div> @endif @if($concept->example) <div class="example-panel">
            <h4>Example</h4>
            <pre>{{ $concept->example }}</pre>
        </div> @endif
    </div> @endforeach @endforeach
</div>
</div>
<script>
    function toggleAccordion(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("show") == -1) {
            x.className += " show";
        } else {
            x.className = x.className.replace(" show", "");
        }
    }

    function showContent(id) { // Hide all content blocks 
        // 
        var contents = document.getElementsByClassName("content-block");
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = "none";
        } 
        // Show the selected content block 
        // 
        document.getElementById(id).style.display = "block";
        // Scroll to top 
        // 
        window.scrollTo(0, 0);
    }
</script>