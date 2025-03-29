<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Aqualab</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <table width="600" cellpadding="0" cellspacing="0" style="background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                <tr>
                        <td style="background:rgb(85, 184, 202); padding: 20px; color: white; text-align: center;">
                            <h1 style="color:rgb(85, 184, 202);">Aqualab</h1>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 20px;">
                            <img src="{{ asset('storage/photos/logoAqualab.png') }}" alt="Imagem do Projeto" style="max-width: 40%; height: auto;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <h2>Caríssimo(a) Cliente,</h2>
                            <p>Segue em anexo o <strong>Relatório Aqualab</strong> por si solicitado.</p>
                            <p>Muito obrigado pela sua preferência!</p>
                            <br>
                            <p>Com os melhores cumprimentos,<br>A Equipa Aqualab.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background: rgb(85, 184, 202); padding: 20px; text-align: center; font-size: 12px; color: #999;">
                            © {{ date('Y') }} Aqualab. Todos os direitos reservados.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
