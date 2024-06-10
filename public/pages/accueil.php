<section data-color="#FFD1FF" class="section classique">
    <div data-aos="fade-right" data-aos-duration="1500" class="text">
        <h2 data-content="Classique">Classique</h2>
        <p class="black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id urna nec urna aliquam dictum.
            Etiam condimentum lacus at massa pretium, ut hendrerit velit vulputate. Cras consequat risus et sem
            accumsan, nec malesuada dui aliquet.</p>
    </div>
    <img src="public/img/jumpdancer.jpg" alt="Danse classique">
</section>

<section data-color="#CC9FCC" class="section jazz">
    <!-- https://michalsnik.github.io/aos/ // data-aos regarder ce site pour trouver les effets -->
    <div data-aos="fade-left" data-aos-duration="1500" class="text">
        <h2 data-content="Jazz">Jazz</h2>
        <p class="black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id urna nec urna aliquam dictum.
            Etiam condimentum lacus at massa pretium, ut hendrerit velit vulputate. Cras consequat risus et sem
            accumsan, nec malesuada dui aliquet.</p>
    </div>
    <img src="public/img/streetdancer.jpg" alt="Danse jazz">
</section>

<section data-color="#995999" class="section2 club">
    <!-- https://michalsnik.github.io/aos/ // data-aos regarder ce site pour trouver les effets -->
    <div data-aos="fade-up" data-aos-duration="1500" class="text">
        <h2 data-content="L'école">L'école</h2>
        <p class="white">Etiam condimentum lacus at massa pretium, ut hendrerit velit vulputate. Cras consequat risus et
            sem accumsan, nec malesuada dui aliquet. <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
            id urna nec urna aliquam dictum. <br> Etiam condimentum lacus at massa pretium, ut hendrerit velit
            vulputate. Cras consequat risus et sem accumsan, nec malesuada dui aliquet. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. <br> Duis id urna nec urna aliquam dictum. Etiam condimentum lacus at massa
            pretium, ut hendrerit velit vulputate. Cras consequat risus et sem accumsan, nec malesuada dui aliquet. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Duis id urna nec urna aliquam dictum. ut hendrerit velit
            vulputate, nec malesuada dui aliquet.</p>
    </div>
    <div class="icon-club">
        <div class="icon-club-item">
            <p><i class="fa-solid fa-graduation-cap"></i></p>
            <p>Apprentissage</p>
        </div>
        <div class="icon-club-item">
            <p><i class="fa-solid fa-bars-progress"></i></p>
            <p>Progression</p>
        </div>
        <div class="icon-club-item">
            <p><i class="fa-solid fa-dumbbell"></i></p>
            <p>Maîtrise</p>
        </div>
    </div>
</section>

<?php if (is_array($articles)): ?>
<div class="slider-container">
    <ul class='slider'>
        <?php foreach ($articles as $article): ?>
        <li class='item' style="background-image: url('public/img/header/<?php echo htmlspecialchars($article['header_image']); ?>')">
     
            <div class='content'>
                <h2 class='title'><?php echo htmlspecialchars($article['title']); ?></h2>
                <p class='description'>Lorem ipsum, dolor sit amet consectetur
                    adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
                    praesentium nisi. Id laboriosam ipsam enim.</p>
                <button>Lire plus</button>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <nav class='nav'>
        <i class="fa-solid fa-left-long btn prev"></i>
        <i class="fa-solid fa-right-long btn next"></i>
    </nav>
</div>
<?php endif; ?>
