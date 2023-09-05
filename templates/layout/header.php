<header class="header">
    <div class="m-100">
        <div class="contact-h">
            <span>Hotline:
                <a class="calling" href="tel:1900633564">
                    <?=$row_setting['hotline']?>
                </a>
            </span>
            <span>Email:
                <a class="calling" href="mailto:<?=$row_setting['email']?>">
                    <?=$row_setting['email']?>
                </a>
            </span>
            <span>Ecommerce:<a href="https://724.vn/" target="_blank"> 724.vn</a></span>
            <div class="language-selector">
                <img class="language-icon" id="languageIcon" src="images/vi.png">
                <select class="language-select" id="languageSelect">
                    <option value="vi">VI</option>
                    <option value="en">EN</option>
                </select>
            </div>
        </div>
    </div>
</header>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var languageSelect = document.getElementById('languageSelect');
    var languageIcon = document.getElementById('languageIcon');

    var selectedLanguage = localStorage.getItem('selectedLanguage');
    if (selectedLanguage) {
        languageSelect.value = selectedLanguage;
        languageIcon.src = `images/${selectedLanguage}.png`;
    }

    languageSelect.addEventListener('change', function() {
        var selectedLanguage = languageSelect.value;
        localStorage.setItem('selectedLanguage', selectedLanguage);
        languageIcon.src = `images/${selectedLanguage}.png`;
        window.location.href = `index.php?com=ngonngu&lang=${selectedLanguage}`;
    });
});
</script>