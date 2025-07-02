<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Komplain Telah Diselesaikan</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f5f7fa; color: #333333; line-height: 1.6;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f5f7fa; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                    
                    <tr>
                        <td align="center" style="background-color: #003366; padding: 30px 20px;">
                            <h1 style="color: #ffffff; font-size: 24px; font-weight: bold; margin: 0;">Sistem Penanganan Komplain</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="font-size: 16px; color: #2c3e50; margin-bottom: 25px;">
                                Yang Terhormat <strong>{{ $pelapor->nama }}</strong>,
                            </p>

                            <p style="font-size: 15px; color: #555555; margin-bottom: 30px;">
                                Dengan ini kami menginformasikan bahwa komplain Anda telah <strong>berhasil diselesaikan</strong> dengan rincian sebagai berikut:
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0" style="border: 1px solid #e1e8ed; border-radius: 8px; margin-bottom: 30px;">
                                <tr>
                                    <td colspan="2" align="center" style="background-color: #003366; color: white; padding: 15px; font-weight: bold; font-size: 16px;">
                                        Rincian Penyelesaian Komplain
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: bold; color: #2c3e50; width: 40%;">Nomor Tiket:</td>
                                    <td style="padding: 15px; color: #003366; font-weight: bold;">
                                        {{ $komplain->tiket }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: bold; color: #2c3e50;">Status:</td>
                                    <td style="padding: 15px;">
                                        <span style="display: inline-block; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; text-transform: uppercase; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
                                            {{ $komplain->status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: bold; color: #2c3e50;">Tanggal Selesai:</td>
                                    <td style="padding: 15px; color: #555555;">
                                        {{ \Carbon\Carbon::parse($komplain->completedj_at)->format('d F Y, H:i') }} WIB
                                    </td>
                                </tr>
                            </table>

                            <!-- Tombol -->
                            <div style="text-align: center; margin-bottom: 30px;">
                                <a href="http://127.0.0.1:8000/lacak/komplain/t?tiket={{ $komplain->tiket }}"
                                   style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; text-decoration: none; padding: 12px 24px; border-radius: 5px; font-weight: bold; display: inline-block;">
                                    Lihat Detail Penyelesaian
                                </a>
                            </div>

                            <p style="font-size: 15px; color: #555555; margin-bottom: 25px;">
                                Apabila Anda membutuhkan bantuan lebih lanjut atau memiliki pertanyaan tambahan, silakan hubungi tim kami melalui kanal layanan yang tersedia.
                            </p>

                            <!-- Footer -->
                            <p style="border-top: 1px solid #e1e8ed; padding-top: 20px; font-size: 15px; color: #2c3e50;">
                                Terima kasih atas kepercayaan Anda kepada layanan kami.<br><br>
                                Hormat kami,<br>
                                <strong>Tim Customer Service</strong><br>
                                <strong>Sistem Penanganan Komplain</strong>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="background-color: #e9ecef; padding: 25px 20px;">
                            <p style="color: #6c757d; font-size: 12px; line-height: 1.5; margin: 0;">
                                &copy; {{ date('Y') }} Sistem Penanganan Komplain. Hak Cipta Dilindungi.<br>
                                Email ini dikirim secara otomatis, mohon tidak membalas email ini.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
