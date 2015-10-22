<?php include_once('controle/rotas.php'); ?>
<html>
    <head>
    	<meta charset="UTF-8">
            <meta property="og:image" content="http://smbps.aws.af.cm" />
            <meta property="og:title" content="SMBPS" />
            <meta property="og:description" content="Sistema de Monitoramento de Boas Práticas em Saúde" />
            <meta property="og:url" content="http://smbps.aws.af.cm/" />

            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link rel="icon" href="<?php echo IMGS; ?>"><!-- IMAGEM FALTANDO -->

            <!-- Latest compiled and minified CSS -->
			<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"> -->

            <!-- MELHORES TEMAS -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w==" crossorigin="anonymous"> -->
            <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha256-sHwgyDk4CGNYom267UJX364ewnY4Bh55d53pxP5WDug= sha512-mkkeSf+MM3dyMWg3k9hcAttl7IVHe2BA1o/5xKLl4kBaP0bih7Mzz/DBy4y6cNZCHtE2tPgYBYH/KtEjOQYKxA==" crossorigin="anonymous">

            <!-- OUTROS -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha256-obxCG8hWR3FEKvV19p/G6KgEYm1v/u1FnRTS7Bc4Ii8= sha512-8Xs5FuWgtHH1JXye8aQcxVEtLqozJQAu8nhPymuRqeEslT6nJ2OgEYeS3cKiXasOVxYPN80DDoOTKWgOafU1LQ==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha256-ZgJYmqb5jZ8WCDqIYHlUarCVI7NDkBCeFnMW1gfihwY= sha512-yK8VlGnQXDlAH4aaZwd0EfmkYwv/XwZaA7VcT9JDO1YeZSvzu94p7/btLABkerIR26o7uYIiEmY59gQv/w/itA==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha256-IsefKVCcMUlgpXQgIMRsqbIqC6aP153JkybxTa7W7/8= sha512-mCNEsmR1i3vWAq8hnHfbCCpc6V5fP9t0N1fEZ1wgEPF/IKteFOYZ2uk7ApzMXkT71sDJ00f9+rVMyMyBFwsaQg==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/journal/bootstrap.min.css" rel="stylesheet" integrity="sha256-bPSyJP9+ovy9/YbIwvZyX6r2M4PkiF01vt0zuDLUEzs= sha512-F4ep7hh9V7i7UvRF56Vq8VgjFIFGRVaE2y5UZ2FtIcMWoLFiDxTmHgnDm1XDZGcc6Vtp+kwtL0Kd3VA8uBMK9g==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha256-kBMbBs0vxJSlN7T3a7hOLllj53zib5nbF7rn4NAKy04= sha512-PwtEPLjYjtwEveJNXQTih2qsQhTg4tjgIy0gruouyKN5NLD4G4jh+mMrf7cA2s5PVI71UlS8DBYr1iqrN7ivBg==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet" integrity="sha256-hMIwZV8FylgKjXnmRI2YY0HLnozYr7Cuo1JvRtzmPWs= sha512-k+wW4K+gHODPy/0gaAMUNmCItIunOZ+PeLW7iZwkDZH/wMaTrSJTt7zK6TGy6p+rnDBghAxdvu1LX2Ohg0ypDw==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/readable/bootstrap.min.css" rel="stylesheet" integrity="sha256-xZf1oKvAz2ou2qhEduvwW4dDmGlmHADVup7mEqdKU6k= sha512-go0HHuJkbEVqGsIW4i045yNp9n/jCC5Dywtr9MmZ41n6h+tBhCLod4AvtLxrFp489K2KppmGbufl0iKnhMwcOQ==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha256-Ay17X/itZzhUFkDfLB9MICE7tbVwtPuFhcwDpABdbEA= sha512-eTtl6Aa3v8DrTCYWH7cAfXt6QW8DpsFn0hdCcYIWe6VDMyPMikXBWd/9bZR5YZNrmHBBu4KGdVgfPs1aEEgVIw==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/simplex/bootstrap.min.css" rel="stylesheet" integrity="sha256-4nVETqQoIoCwuephcXpJ501G8B5sgBHb1ZsKU/D476I= sha512-cfSmkkLRDAcUNaJxRRWopCyEGX43UkWCAOl2wErYMBGOQVWwOsZ7IFuXScF9H/6nMGbmsgV4m5/xYfesyvHTxw==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/slate/bootstrap.min.css" rel="stylesheet" integrity="sha256-JcgoO7qVianjbv43Z5KinReHzk9/rEZg5m6z/ZZy3DI= sha512-rYMbEYJa5+7VkGdfAypdYHqwIdCNEBKh8lhKUNIv58tgHQuHHzXC/Bzf66BFDkTjq970Lc6OIEpgllKINGDCKQ==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/spacelab/bootstrap.min.css" rel="stylesheet" integrity="sha256-j7Dtnd7ZjexEiPNbscbopFn9+Cs0b3TLipKsWAPHZIM= sha512-RFhfi6P8zWMAJrEGU+CPjuxPh3r/UUBGqQ+/o6WKPIVZmQqeOipGotH2ihRULuQ8wsMBoK15TSZqc/7VYWyuIw==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/superhero/bootstrap.min.css" rel="stylesheet" integrity="sha256-o0IkLyCCWGBI+ryg6bL44/f8s4cb7+5bncR4LvU57a8= sha512-jptu6vg45XTY9uPX3vD5nHN4vASCN2hHl+fhmgkdd/px/bFHKMXmDXhkNmTiCpKqH6sliEPFakl2KZNav2Zo1Q==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css" rel="stylesheet" integrity="sha256-nKQVXFJ5JtDJlI5p1UcSf0JOFudCj9RgjBDsJSZPsS4= sha512-dbadXecsBCgqQ5XGx6SG+bO4vsfzznX6/NfAG4CuzLi76wcdLGAw2KIcsLyv7H5XsEGq0zaznpxDCAEIX9pdYA==" crossorigin="anonymous"> -->
            <!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha256-gJ9rCvTS5xodBImuaUYf1WfbdDKq54HCPz9wk8spvGs= sha512-weqt+X3kGDDAW9V32W7bWc6aSNCMGNQsdOpfJJz/qD/Yhp+kNeR+YyvvWojJ+afETB31L0C4eO0pcygxfTgjgw==" crossorigin="anonymous"> -->

            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="/<?php echo BASE; ?>estaticos/bootstrap-sweetalert/lib/sweet-alert.css">
            <link rel="stylesheet" href="/<?php echo BASE; ?>estaticos/estilo.css">
            
        <title>Sistema de Monitoramento de Boas Práticas em Saúde</title>
    </head>
    <body>
        <div class='wrapper'>
            <div class='header'>
        <?php  
            incluir_menu();
        ?>
            </div>
            <div class='content'>
        <?php  
            include_conteudo(); //mostrar o template incluído
        ?>
        	</div>
            <div class='footer'>
        <?php  
            include_once(TEMPLATES.'/geral/footer.php');
        ?>
            </div>
        <?php
            //include_once(TEMPLATES.'/preview.php');
        ?>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="/<?php echo BASE; ?>estaticos/functions.js"></script>
    <script src="/<?php echo BASE; ?>estaticos/bootstrap-sweetalert/lib/sweet-alert.min.js"></script> 
    <script src="/<?php echo BASE; ?>estaticos/Jquery_Mask/jquery.mask.js"></script>
</html>