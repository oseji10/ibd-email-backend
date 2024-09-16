<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

    <title>Nomination For Fellow Institute of Business Development</title>
    <style>
        body {
            /* background-image: url('{{ public_path('images/letterhead.jpg') }}'); */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin-top: -10;
            padding: 0;
            font-size: 14px;
        }

        /* Apply background image only to the first page */
        body:first-child {
            background-image: url('{{ public_path('images/letterhead.jpg') }}');
        }

        /* Remove background image for subsequent pages */
        body:not(:first-child) {
            background-image: none;
        }

        /* Apply margin only to the text content */
        .text-content {
            margin-left: 160;
            margin-top: 20;
        }

        .page-break {
            page-break-before: always;
        }

        .second-page-content {
            /* margin-left: 160; */
            margin-top: 60;
            /* margin-bottom: -100; */
            position: relative;
        }

        /* Image placement for second page */
        .second-page-content img.top {
            width: 100%;
            height: auto;
        }

        .second-page-content img.bottom {
            width: 100%;
            height: auto;
            position: relative;
            bottom: 0;
            margin-left: 0 !important;
        }
    </style>
</head>
<body>
<img style="margin-top:-30; width:100%; height:auto;" src="{{ public_path('images/header.png') }}">
    <div class="text-content">
    @php
    use Carbon\Carbon;
    $formattedDate = Carbon::parse($nomination_date)->format('F j, Y');
@endphp



        <p>{{ $formattedDate }}</p>
        <p><b>{{$title}} {{$first_name}} {{$othernames}}</b></p>
        <p>Dear Sir,</p>
        <p><b><u>NOMINATION FOR THE AWARD OF FELLOW OF THE INSTITUTE OF BUSINESS DEVELOPMENT AND INVITATION TO ATTEND OUR 9TH NATIONAL CONFERENCE</u></b></p>
        <p>On behalf of the Council, we are pleased to inform you of your nomination for the conferment of the award of Fellow of the Institute of Business Development. This honour is in recognition of your outstanding professional achievements and exemplary leadership in public service.</p>
        <p>We are particularly proud to note that your nomination was as a result of a recommendation by a Fellow of our Institute, further highlighting your esteemed reputation within the professional and leadership community.</p>
        <p>We hope you will graciously accept this valued award and participate in our forthcoming conference. This Fellow Award of the Institute is the highest distinction conferred by the Institute and is reserved for distinguished professionals and leaders who have demonstrated excellence in their fields. As the leading global professional body for Business Development professionals, the Institute also serves as an internationally recognized examining and awarding body for Professionals in the field of Business Development and Strategy.</p>
        <p>We are pleased to inform you that participation at the conference is part of the process to align you with the institute. It will also provide a valuable opportunity for you to engage with fellow industry leaders, government officials, members of the diplomatic community, and key stakeholders in Business Sphere. This conference will foster dialogue on how best to tackle current challenges while advancing growth and innovation across sectors.</p>
        <p><b>The award will be presented to you at the dinner of the Conference.<br/>
        The 9th Annual Conference further details are as follows:</b></p>
        <ul>
        <li>Theme: "Driving Industrialization and Enhancing Productivity: Empowering Nigerian Youth for a Thriving Economic Future"</li>
        <li>Date: November 12th-13th, 2024</li>
        <li>Venue: Jacaranda Hall, Abuja Continental Hotel</li>
        <li>Conference Fee: N375,000.00</li>
        </ul>    
        <p>The Institute remains committed to upholding the highest Standard, Professionalism, Quality, and Integrity  in the field of Business Development. As the recognized professional body for Business Development Professionals in Nigeria, we represent the interests of our members before the government, the business community, and the public. The Institute maintains a comprehensive Code of Conduct and Professional Standards, ensuring the continued development of the profession and its members.</p>
    </div>
    <img  src="https://app.ibd.ng/images/side.png" alt="Top Image" style="width:28%; height:auto; position:absolute; margin-top:-600">
    <img src="{{ public_path('images/footer.png') }}" width="100%" height="auto" style="margin-bottom:-100">
    
    
    <div class="page-break"></div>

    <img class="top" src="{{ public_path('images/header.png') }}" alt="Top Image" style="width:100%">
    <div class="second-page-content">

        

        <p>As part of our ongoing commitment to education and professional growth, the Institute is also a member of prominent organizations such as the African Business Roundtable, the Business Council of Africa, and the West African Business Association. The Institute’s Associate Certificate has been rated by NARIC of UK as British Masters taught degree.</p>
        <p>If you accept this nomination and invitation, kindly confirm your participation by sending an email to conference@ibd.ng. Alternatively, you may contact our program coordinator at 08034520370 or 08036576494. We would also appreciate it if you could send a brief professional profile, CV, or resume, and a passport photograph via WhatsApp to 08080795347 or the email provided above.</p>
        <p>Payments can be made through the account details provided below: </p>

        <p><b>Account Name:</b> The Institute of Business Development<br/>
        <b>Account Number:</b> 1007360801<br/>
        <b>Bank:</b> United Bank for Africa</p>
        <p>We look forward to welcoming you to this distinguished event and celebrating your conferment as a Fellow of the Institute of Business Development.</p>
        <p style="margin-bottom:0">Yours sincerely,</p><br/><br/>
<table width="100%">
    <tr>
        <td style="text-align: left"><br/>
        <img src="" /><br/><br/>
        Prof Ben Oghojafor FBDI <br/>
        President/Chairman     
        </td>
        <td style="text-align: center">
        <img src="{{ public_path('images/dg-sign.png') }}" width="50%" height="auto"/><br/>
        Prof Ben Oghojafor FBDI <br/>
        President/Chairman     
        </td>
    </tr>
    </table>
    <!-- <img class="bottom" src="{{ public_path('images/footer.png') }}">   -->
</div>
<img style=" margin-top:210" src="{{ public_path('images/footer.png') }}" width="100%" height="auto" >
</body>
</html>