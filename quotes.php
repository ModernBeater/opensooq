<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Motivational and Love Slogans</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .quote-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            position: relative;
        }
        .copy-btn, .share-btn {
            position: absolute;
            top: 10px;
            right: 50px;
            cursor: pointer;
        }
        .share-btn {
            right: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4 text-center">Motivational and Love Slogans</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="quoteTabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tamil">Tamil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#english">English</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Tamil Quotes -->
        <div class="tab-pane fade show active" id="tamil">
            <?php
            $tamilQuotes = [
                "வாழ்க்கை என்பது சவால்கள் நிறைந்த பயணம்.",
                "காதல் என்பது ஒரு வலிமையான உணர்வு.",
                "வெற்றி என்பது பொறுமைக்கும் கடின உழைக்கும் பலன்."
            ];
            foreach ($tamilQuotes as $quote) {
                echo '
                <div class="quote-box">
                    <p class="quote-text">' . $quote . '</p>
                    <span class="copy-btn badge badge-success" onclick="copyQuote(this)">Copy</span>
                    <span class="share-btn badge badge-primary" data-toggle="modal" data-target="#shareModal" onclick="setShareContent(\'' . addslashes($quote) . '\')">Share</span>
                </div>';
            }
            ?>
        </div>

        <!-- English Quotes -->
        <div class="tab-pane fade" id="english">
            <?php
            $englishQuotes = [
                "Life is a journey full of challenges.",
                "Love is a powerful emotion.",
                "Success comes from patience and hard work."
            ];
            foreach ($englishQuotes as $quote) {
                echo '
                <div class="quote-box">
                    <p class="quote-text">' . $quote . '</p>
                    <span class="copy-btn badge badge-success" onclick="copyQuote(this)">Copy</span>
                    <span class="share-btn badge badge-primary" data-toggle="modal" data-target="#shareModal" onclick="setShareContent(\'' . addslashes($quote) . '\')">Share</span>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Share this Quote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p id="shareQuote" class="mb-3"></p>
        <a id="whatsappShare" class="btn btn-success mb-2" target="_blank">WhatsApp</a><br>
        <a id="facebookShare" class="btn btn-primary mb-2" target="_blank">Facebook</a><br>
        <a id="twitterShare" class="btn btn-info" target="_blank">Twitter</a>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function copyQuote(elem) {
        const text = elem.parentElement.querySelector('.quote-text').innerText;
        navigator.clipboard.writeText(text).then(() => {
            alert('Quote copied!');
        });
    }

    function setShareContent(quote) {
        document.getElementById('shareQuote').innerText = quote;
        const encoded = encodeURIComponent(quote);
        document.getElementById('whatsappShare').href = `https://wa.me/?text=${encoded}`;
        document.getElementById('facebookShare').href = `https://www.facebook.com/sharer/sharer.php?u=&quote=${encoded}`;
        document.getElementById('twitterShare').href = `https://twitter.com/intent/tweet?text=${encoded}`;
    }
</script>
</body>
</html>
