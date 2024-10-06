<div class="section no-sidebar is-expanded" style="display: flex; align-items: center; justify-content: center;">
    <div class="main">

        <div class="article">

            <div>
                <div id="load" style="display: none"></div>
                <div>
                    <header class="article-header">
                        <h1 class="article-title text-center"><?php esc_html_e( 'Bez rezultata!', 'dizajn' ) ?></h1>
                    </header>

                    <div class="article-content">
                        <p class="text-center m-0"><?php esc_html_e( 'Stranice ne postoji ili je uklonjena.', 'dizajn' ); ?></p>
                        <img class="d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/404.png" alt="404">
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script>
                $(document).ready(function(){
                    const archiveUrl = 'http://localhost:10048';
                    // const archiveUrl = 'https://kodex.me';
                    // const slug = window.location.pathname;
                    const slug = '/dps-kotor-trazi-ponistavanje-izbora-na-dva-biracka-mjesta/';
                    const finalUrl = archiveUrl + slug;

                    console.log(finalUrl);
                    console.log('dsvdsfsd');

                    $("#load").load(finalUrl + " article.article", function(responseTxt, statusTxt, jqXHR){
                        if(statusTxt === "success"){
                            $('#load').show().next().hide();
                            // $('#load').next().hide();
                        }
                        if(statusTxt === "error"){

                        }
                    });
                });
            </script>

        </div>

    </div>
</div>