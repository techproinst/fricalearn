<body style="margin: 0; padding: 0; background-color: #f2f4f8; font-family: 'Be Vietnam Pro', sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="max-width: 100%;">
    <tr>
      <td align="center">
        <table cellpadding="0" cellspacing="0" border="0"
          style="background-color: #ffffff; border-radius: 20px; padding: 20px; width: 100%; max-width: 600px; box-sizing: border-box;">

          <!-- Header -->
          <tr>
            <td align="center" style="padding-bottom: 20px;">
              <img src="{{ asset('assets/images/logo.png') }}" alt="Frika Learn" width="100"
                style="display: block; max-width: 100%;" />
              <h1 style="margin: 10px 0; font-size: 24px; color: #3b2a56;">Frika Learn</h1>
            </td>
          </tr>

          <!-- Banner -->
          <tr>
            <td align="center">
              <img src="{{ asset('assets/images/email-img.png') }}" alt="Email Banner"
                style="max-width: 100%; height: auto; display: block;" />
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding: 20px;">
              <h4>Your Language Journey Begins!</h4>
              <p>Hello {{ $parent->name }},</p>
              <p>Thank you for signing up for our demo {{ $parentCourse->name }} course.</p>

              <h5>🔗 Demo Class Links:</h5>
              <ul style="padding-left: 20px;">
                @foreach ($demoCourseLinks as $link)
                <li style="word-break: break-word; overflow-wrap: break-word;">
                  <a style="text-decoration: none; color: #3b2a56;" href="{{ $link->demo_course_link }}">
                    {{ $link->demo_course_link }}
                  </a>
                </li>
                @endforeach
              </ul>

              <p>Make sure to check your spam or promotions folder if you don’t see the email.</p>
              <p>Need help? Contact our support team at <a href="mailto:[Support Email]"
                  style="color: #3b2a56;">[Support Email]</a>.</p>

              <p>🚀 Click the button below to register your child/ward and start learning!</p>

              <table align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%; text-align: center;">
                <tr>
                  <td bgcolor="#3b2a56" style="border-radius: 5px; text-align: center;">
                    <a href="[Join Link]" style="display: inline-block; font-size: 16px; font-weight: 500; text-decoration: none; color: #ffffff; background-color: #3b2a56;
                              padding: 12px 20px; border-radius: 5px; width: auto; max-width: 200px;">
                      Register Now
                    </a>
                  </td>
                </tr>
              </table>

              <p>Happy learning! 🚀<br>Frika Learn Team</p>
            </td>
          </tr>
        </table>

        <!-- Footer -->
        <table cellpadding="0" cellspacing="0" border="0"
          style="margin-top: 20px; text-align: center; width: 100%; max-width: 600px;">
          <tr>
            <td>
              <p>Follow us on:</p>
              <a href="#"><img src="{{ asset('assets/images/twitter-dark.png') }}" alt="Twitter" width="24" /></a>
              <a href="#"><img src="{{ asset('assets/images/facebook-dark.png') }}" alt="Facebook" width="24" /></a>
              <a href="#"><img src="{{ asset('assets/images/linkedin-dark.png') }}" alt="LinkedIn" width="24" /></a>
            </td>
          </tr>
          <tr>
            <td>
              <p>Copyright © 2025</p>
              <p>Sent by Frika Learn Support: <a href="mailto:support@frikalearn.com"
                  style="color: #3b2a56;">support@frikalearn.com</a></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <!-- Media Query for Mobile Devices -->
  <style>
    @media screen and (max-width: 600px) {
      table {
        width: 100% !important;
      }

      td {
        padding: 10px !important;
      }

      img {
        max-width: 100% !important;
        height: auto !important;
        display: block !important;
      }

      a {
        display: block !important;
        text-align: center !important;
      }




      td a {
        display: inline-block !important;
        margin: 5px !important;
      }


      ul {
        padding-left: 15px !important;
      }

      /* Adjust button width */
      a[href="[Join Link]"] {
        display: block !important;
        width: auto !important;
        max-width: 150px !important;
        padding: 8px 10px !important;
      }
    }
  </style>
</body>