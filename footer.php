<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
    <p>Sosyal Medya Hesapları</p>
    <?php
        $sosyal = $db -> prepare("SELECT * FROM sosyal");
        $sosyal -> execute();
        $hesap = $sosyal -> fetch(PDO::FETCH_ASSOC);
    ?>
    <a href="<?= $hesap['linkedin'] ?>" target="_blank" " ><i class="fa fa-linkedin w3-hover-opacity"></i></a>
    <a href="<?= $hesap['facebook'] ?>" target="_blank" ><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="<?= $hesap['instagram'] ?>" target="_blank" " ><i class="fa fa-instagram w3-hover-opacity"></i></a>
    <p>
        <?= $veri['site_footer']; ?>
        <a href="<?= $veri['site_url'] ?>" target="_blank">Mert Erdoğan</a>
    </p>

</footer>

</body>
</html>