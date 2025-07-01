<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Komplain Baru Masuk</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f5f7fa; color: #333; line-height: 1.6;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f5f7fa; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #003366; padding: 30px 20px;">
                            <h1 style="color: #ffffff; font-size: 24px; font-weight: bold; margin: 0;">Pemberitahuan Komplain Baru</h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="font-size: 16px; color: #2c3e50; margin-bottom: 25px;">
                                Komplain baru telah diajukan melalui sistem. Berikut adalah detailnya:
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0" style="border: 1px solid #e1e8ed; border-radius: 8px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 15px; font-weight: bold; color: #2c3e50; width: 40%;">Nomor Tiket:</td>
                                    <td style="padding: 15px; color: #003366; font-weight: bold;">
                                        {{ $komplain->tiket }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: bold; color: #2c3e50;">Tanggal Komplain:</td>
                                    <td style="padding: 15px; color: #555;">
                                        {{ $komplain->created_at->format('d F Y, H:i') }} WIB
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: bold; color: #2c3e50;">Nama Pelapor:</td>
                                    <td style="padding: 15px; color: #555;">
                                        {{ $pelapor->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: bold; color: #2c3e50;">Isi Komplain:</td>
                                    <td style="padding: 15px; color: #555;">
                                        {{ $komplain->message }}
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size: 15px; color: #555555; margin-bottom: 25px;">
                                Silakan login ke dashboard untuk menindaklanjuti laporan ini.
                            </p>

                            <p style="font-size: 14px; color: #888888;">
                                Email ini dikirim secara otomatis oleh sistem. Mohon tidak membalas email ini.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #e9ecef; padding: 25px 20px;">
                            <p style="color: #6c757d; font-size: 12px; line-height: 1.5; margin: 0;">
                                &copy; {{ date('Y') }} Sistem Penanganan Komplain. Hak Cipta Dilindungi.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
