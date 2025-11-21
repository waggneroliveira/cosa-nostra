<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de reserva</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table class="wrapper" width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color: #fff; margin: 20px auto; border-radius: 8px; overflow: hidden;">
        <tbody>
            <!-- Header -->
            <tr>
                <td colspan="2" style="text-align: center; padding: 10px 0;position: relative;overflow:hidden; background:#C9C9C9;">
                    <img src="{{ asset('build/client/images/header-logo/logo_header.svg') }}" alt="Cantina Cosa Nostra" style="width: 100px; display: block; margin: 0 auto;">
                </td>
            </tr>

            <!-- Main Content -->
            <tr>
                <td colspan="2" style="padding: 35px 20px;">
                    <h1 style="color: #28a745; font-size: 32px; margin: 0 0 5px; text-align: center;">
                        Reserva Confirmada!
                    </h1>
                    <h2 style="color: #10131C; font-size: 22px; margin: 0 0 25px; text-align: center; font-weight: 700;">
                        Seu agendamento foi confirmado
                    </h2>

                    <p style="color:#333; font-size:18px; font-weight:600; margin:0 0 8px;">
                        Olá, {{ $name }}
                    </p>

                    <p style="color:#555; font-size:15px; line-height:1.6; margin:0 0 18px;">
                        Temos o prazer de informar que sua reserva foi <strong style="color:#28a745;">confirmada</strong>.
                    </p>

                    <div style="background:#F9F9F9; padding:18px 20px; border-radius:8px; border:1px solid #E5E5E5; margin-bottom:22px;">
                        <h3 style="margin: 0 0 15px; font-size:18px; color:#10131C; border-left:4px solid #C8A66B; padding-left:10px;">
                            Detalhes da Reserva
                        </h3>

                        <p style="color:#444; font-size:15px; line-height:1.5; margin:0 0 10px;">
                            Data: <strong>{{ $date }}</strong>.
                        </p>

                        <p style="color:#444; font-size:15px; line-height:1.5; margin:0 0 10px;">
                            Horário: <strong>{{ $hour }}h</strong>.
                        </p>

                        <p style="color:#444; font-size:15px; line-height:1.5; margin:0 0 10px;">
                            Nº de pessoas: <strong>{{ $people }}</strong>
                        </p>

                        <p style="color:#444; font-size:15px; line-height:1.5; margin:0;">
                            Área reservada: <strong>{{ $location_area }}</strong>
                        </p>
                    </div>


                    <p style="color: #555; font-size: 15px; line-height: 1.5;margin-bottom:0;">
                        Agradecemos sua preferência. Estamos preparando tudo para recebê-lo(a) com o melhor atendimento da Cantina Cosa Nostra.
                    </p>

                    <div style="background:#FFF7E6; padding:12px 15px; border-left:4px solid #C8A66B; border-radius:6px; margin:15px 0;">
                        <p style="color:#8A6D3B; font-size:14px; line-height:1.5; margin:0;">
                            <strong>Observação:</strong> A Cantina Cosa Nostra garante uma tolerância de espera de <strong>15 minutos</strong> após o horário agendado. 
                            Após esse período, a mesa poderá ser disponibilizada para outros clientes.
                        </p>
                    </div>


                    <p style="color: #555; font-size: 15px; line-height: 1.5;margin-top:10px;">
                        Atenciosamente,<br>
                        <img src="{{ asset('build/client/images/header-logo/logo_header.svg') }}" alt="Cantina Cosa Nostra" style="width: 70px">
                    </p>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td colspan="2" style="background:#C9C9C9; padding: 0;">
                    <!-- Linha superior colorida -->
                    <div style="width: 100%; height: 4px; background-color: #CA232A;"></div>

                    <!-- Logotipo centralizado -->
                    <div style="padding: 10px 0px; text-align: center;padding-bottom:10px;">
                        <img src="{{ asset('build/client/images/header-logo/logo_header.svg') }}" alt="Cantina Cosa Nostra" style="width: 70px; display: block; margin: 0 auto;">
                    </div>
                    
                    <div style="text-align: center;">
                        <a href="https://www.instagram.com/cantinacosanostra/" target="_blank" style="font-weight: bold;color: #222021;font-size: 12px;text-decoration: none;display: inline-block;">
                            @cantinacosanostra
                        </a>
                    </div>

                    <!-- Rodapé com links e texto -->
                    <div style="padding: 0px 20px 10px 20px; font-family: Arial, sans-serif; color: #222021; position:relative">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="color: #222021;">
                            <tr>
                                <td style="text-align: left; font-size:12px;">
                                    {{ date('Y') }} © Cantina Cosa Nostra
                                </td>
                                <td style="text-align: right;">
                                    <a href="https://www.whi.dev.br/" target="_blank" style="font-size:12px; color:#222021; text-decoration: none; margin-left: 10px;">Sobre Nós</a>
                                    <a href="https://wa.me/5571996483853" target="_blank" style="font-size:12px; color:#222021; text-decoration: none; margin-left: 10px;">Fale conosco</a>
                                </td>
                            </tr>
                        </table>                        
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
