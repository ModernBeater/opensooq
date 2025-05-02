<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reels Status - Filter by Category</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .reel-card img {
      height: 180px;
      object-fit: cover;
      border-radius: 5px;
    }
    .card-title {
      font-size: 1rem;
      margin-top: 10px;
      min-height: 40px;
    }
    .download-btn {
      margin-top: 10px;
    }
    .filter-btn {
      margin: 5px;
    }
  </style>
</head>
<body>
<div class="container mt-4">
  <h2 class="text-center mb-4">Download & Share Video Reels</h2>

  <!-- Filter Buttons -->
  <div class="text-center mb-4">
    <button class="btn btn-secondary filter-btn" onclick="filterCategory('all')">All</button>
    <button class="btn btn-outline-primary filter-btn" onclick="filterCategory('motivational')">Motivational</button>
    <button class="btn btn-outline-success filter-btn" onclick="filterCategory('ai')">AI</button>
    <button class="btn btn-outline-warning filter-btn" onclick="filterCategory('fitness')">Fitness</button>
    <button class="btn btn-outline-info filter-btn" onclick="filterCategory('comedy')">Comedy</button>
    <button class="btn btn-outline-danger filter-btn" onclick="filterCategory('spiritual')">Bhakti</button>
    <button class="btn btn-outline-dark filter-btn" onclick="filterCategory('business')">Business</button>
  </div>

  <div class="row" id="reelContainer">
    <?php
    // [title, thumbnail, link, category]
    $reels = [
      ["100+ HQ Motivational Reels (Hindi)", "motivational-hindi.jpg", "https://drive.google.com/drive/folders/1XbRxSbtNtjlq-gPOb3XMM53HfIb1kJMZ?usp=sharing", "motivational"],
      ["600+ AI Reels Bundle", "ai-bundle.jpg", "https://drive.google.com/drive/folders/1AZgXm_-4wcHoRVSc0hNYtBPTmiYyvjKU?usp=sharing", "ai"],
      ["Kapil Sharma Reels Bundle", "kapil.jpg", "https://drive.google.com/drive/folders/1ebHNOPHZcMWe1KBetMVFc0YqzXjtHAbh", "comedy"],
      ["3800+ Shark Tank Reels", "sharktank.jpg", "https://drive.google.com/drive/folders/1QMF4a66fIgvC8BpU3oyi2P2NA5kr6LHq", "business"],
      ["Car Reels Bundle", "car-reels.jpg", "https://drive.google.com/drive/folders/1n9s_PYqWku13IDw1SwlsnVmH5rfXR_A8?usp=drive_link", "motivational"],
      ["Fitness Reels (Men & Women)", "fitness.jpg", "https://drive.google.com/drive/folders/1maID_DgrGhrXMvCs7d7JtGPorOmMfbKH", "fitness"],
      ["AI Business Reels", "ai-business.jpg", "https://drive.google.com/drive/folders/1wFHnCLNJweI4eKGwSlBwzLyzEWEJCN_F?usp=share_link", "ai"],
      ["Art & Craft Reels", "craft.jpg", "https://drive.google.com/drive/folders/1qu2D1SPkxpvi02-so_yFPLX_FlVnghxg?usp=share_link", "motivational"],
      ["Bhakti Sanatan Reels", "bhakti.jpg", "https://drive.google.com/drive/folders/18eF__yc_pqovqftmrhvXjQ787gcELOxE", "spiritual"]
    ];

    foreach ($reels as [$title, $thumb, $link, $category]) {
      echo '
      <div class="col-md-4 mb-4 reel-item" data-category="'.$category.'">
        <div class="card reel-card shadow-sm p-2">
          <img src="thumbnails/'.$thumb.'" alt="'.$title.'" class="card-img-top">
          <div class="card-body text-center">
            <h5 class="card-title">'.$title.'</h5>
            <a href="'.$link.'" target="_blank" class="btn btn-primary download-btn">Download / View</a>
          </div>
        </div>
      </div>';
    }
    ?>
  </div>
</div>

<script>
function filterCategory(category) {
  const items = document.querySelectorAll('.reel-item');
  items.forEach(item => {
    const match = item.getAttribute('data-category') === category || category === 'all';
    item.style.display = match ? 'block' : 'none';
  });
}
</script>

</body>
</html>
