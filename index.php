<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Luz Ingá - Materiais de Decoração e Iluminação">
    <link rel="stylesheet" href="style.css">
    <title>Luz Ingá</title>
</head>
<body>
    <canvas id="bgCanvas"></canvas>
    <div class="container">
        <header class="main-header">
            <a href="/" class="logo-link">
                <img src="images/Logo.png" alt="Logo Luz Ingá" class="logo" width="100" height="100">
            </a>
            <h1>Luz Ingá</h1>
            <nav class="main-nav">
                <ul>
                    <li><a href="#produtos" class="btn-style">Produtos</a></li>
                    <li><a href="#cadastro" class="btn-style">Cadastro</a></li>
                    <li><a href="#contato" class="btn-style">Contato</a></li>
                    <li><button id="theme-toggle" class="btn-style">🌙</button></li>
                </ul>
            </nav>
        </header>

        <main>
            <section class="hero">
                <h2>Materiais de Decoração e Iluminação</h2>
                <p>Conheça nossa linha completa de produtos para iluminação e decoração.</p>
            </section>

            <section id="produtos" class="products">
                <h2 class="products-title">Nossos Produtos</h2>
                <div class="products-grid">
                    <article class="product-card">
                        <img src="images/chandelier.jpg" alt="Lustre Clássico" loading="lazy" width="150" height="150">
                        <h3>Lustres Clássicos</h3>
                    </article>
                    <article class="product-card">
                        <img src="images/table_lamp.jpg" alt="Luminária de Mesa" width="150" height="150">
                        <h3>Luminárias de Mesa</h3>
                    </article>
                    <article class="product-card">
                        <img src="images/led_lamp.jpg" alt="Lâmpada LED" width="150" height="150">
                        <h3>Lâmpadas LED</h3>
                    </article>
                    <article class="product-card">
                        <img src="images/cable.jpg" alt="Cabo Elétrico" width="150" height="150">
                        <h3>Cabos Elétricos</h3>
                    </article>
                </div>
            </section>

            <section id="cadastro" class="newsletter">
                <h2>Receba Nossas Promoções</h2>
                <form action="salvar_newsletter.php" method="POST" id="newsletterForm">
                    <label for="name"><strong>Nome:</strong></label>
                    <input type="text" 
                           id="name" 
                           name="nome" 
                           placeholder="Seu nome" 
                           pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]{3,}"
                           title="Digite um nome válido com pelo menos 3 letras"
                           required>
                    
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           placeholder="exemplo@email.com" 
                           required>
                    
                    <label for="phone"><strong>Telefone:</strong></label>
                    <input type="tel" 
                           id="phone" 
                           name="telefone" 
                           placeholder="(XX) XXXX-XXXX" 
                           pattern="\(\d{2}\)\s\d{4,5}-\d{4}"
                           title="Digite um telefone no formato (XX) XXXX-XXXX ou (XX) XXXXX-XXXX"
                           required>
                    
                    <label for="address"><strong>Endereço:</strong></label>
                    <input type="text" 
                           id="address" 
                           name="endereco" 
                           placeholder="Rua, número, bairro" 
                           minlength="5"
                           required>
                    
                    <label for="city"><strong>Cidade:</strong></label>
                    <input type="text" 
                           id="city" 
                           name="cidade" 
                           placeholder="Sua cidade" 
                           minlength="2"
                           required>
                    
                    <button type="submit" class="btn-style">Cadastrar</button>
                </form>
            </section>

            <section id="contato" class="contact">
                <h2>Entre em Contato</h2>
                <address>
                    <p><strong>Telefone:</strong> <a href="tel:+XXXXXXXXXXXXX">(XX) XXXX-XXXX</a></p>
                    <p><strong>Email:</strong> <a href="mailto:contato@luzinga.com.br">contato@luzinga.com.br</a></p>
                    <p><strong>Endereço:</strong> Rua Exemplo, 123 - Centro</p>
                </address>
            </section>
        </main>

        <footer class="main-footer">
            <p>&copy; 2025 Luz Ingá. Todos os direitos reservados.</p>
        </footer>
    </div>
    <div id="popup" class="popup"></div>
    <script src="background.js"></script>
    <script src="script.js"></script>
</body>
</html>