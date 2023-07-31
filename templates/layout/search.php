<div id="search" class="search">
    <form action="tim-kiem.html" method="get" name="frm_search" id="frm_search" onsubmit="return false;">
        <div class="search-btn-better">
            <button id="searchBtn" class="search-icon">
                <i class="fas fa-search"></i>
            </button>
            <div id="inputContainer">
                <input type="text" id="search_input" name="keyword" onkeypress="doEnter(event)"
                    value="<?php echo _nhaptukhoa ?>" onblur="if(this.value=='') this.value='<?php echo _nhaptukhoa ?>'"
                    onfocus="if(this.value =='<?php echo _nhaptukhoa ?>') this.value=''" />
                <i class="fas fa-search search-icon-right" id="searchIcon"></i>
            </div>
            <button type="submit" name="searchAct" id="btnSearch" style="display: none;">Go</button>
        </div>
    </form>
    <script type="text/javascript">
    const searchBtn = document.getElementById("searchBtn");
    const inputContainer = document.getElementById("inputContainer");
    const searchInput = document.getElementById("search_input");
    const searchIcon = document.getElementById("searchIcon");
    let firstSearch = true;

    searchIcon.addEventListener("click", onSearch);

    searchBtn.addEventListener("click", (event) => {
        inputContainer.classList.toggle("showm");
        if (inputContainer.classList.contains("showm")) {
            setTimeout(() => {
                searchInput.focus();
            }, 300);
        }
        event.stopPropagation();
    });

    document.addEventListener("click", (event) => {
        if (!inputContainer.contains(event.target) && inputContainer.classList.contains("showm")) {
            hideSearchInput();
        }
    });

    searchInput.addEventListener("focus", () => {
        inputContainer.classList.add("showm");
        searchBtn.style.opacity = 0;
    });

    searchInput.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            onSearch();
        }
    });

    function onSearch(evt) {
        const keyword = searchInput.value;
        if (!keyword || keyword === '<?php echo _nhaptukhoa ?>') {
            alert('<?php echo _chuanhaptk ?>');
            searchInput.focus();
            return false;
        }
        location.href = 'http://<?php echo $config_url ?>/vietnhat-tech.com/tim-kiem.html/keyword=' +
            encodeURIComponent(keyword);
    }

    function hideSearchInput() {
        inputContainer.classList.remove("showm");
        searchBtn.style.opacity = 1;
    }
    </script>
</div>

<style>
/* .search {
    width: 250px;
    height: 30px;
} */

button.search-icon {
    padding: 10px;
    cursor: pointer;
    background-color: #262626;
    border: none;
    outline: none;
    border-radius: 50%;
    transition: background-color 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
}

#inputContainer {
    display: flex;
    align-items: center;
    position: absolute;
    top: 0;
    right: 0;
    left: auto;
    width: 0;
    height: 40px;
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: width 0.3s ease;
}

#inputContainer.showm {
    width: 220px;
}

#searchInput {
    flex: 1;
    padding: 10px 40px 10px 15px;
    border: none;
    border-radius: 6px;
    outline: none;
    opacity: 0;
    transition: opacity 0.3s ease, padding 0.3s ease, width 0.3s ease;
}

#inputContainer.showm #searchInput {
    opacity: 1;
}

#inputContainer.showm #searchBtn {
    opacity: 1;
    transform: translateX(-50%);
    pointer-events: auto;
}

#inputContainer i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    /* pointer-events: none; */
}

.search-icon-right {
    font-size: 15px;
    right: 10px;
    margin-right: 8px;
    cursor: pointer;
    /* pointer-events: none; */
}

.search-icon i {
    font-size: 18px;
    color: #fff;
}

.search-icon:hover {
    background-color: #e0e0e0 !important;
}

.search-icon:hover i {
    color: #333;
}
</style>
