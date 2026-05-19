@extends('layout.users.index')
@section('title')
    Privacy Policy
@endsection
@section('css')
    <style class="css">
        .capsule{
            padding:10px 20px;
            border:1px solid var(--primary);
            background:var(--primary-01);
            color:var(--primary);
            user-select:none;
            -webkit-user-select: none;
            display:flex;
            flex-direction: row;
            align-items:center;
            gap:10px;
            width:fit-content;
            border-radius:100px;
        }
        .privacy-title{
            margin-top:20px;
            font-size:3rem;
            font-family:'bebas neue';
            display:inline-block;

        }
        .privacy-title span{
            color:var(--primary);
        }
        .privacy-hero{
            padding:20px;
            border-bottom: 1px solid var(--primary-02)
        }
        .policy-body{
            padding:20px;
            background:hsl(var(--primary-hsl),100%,93%)
        }
        .policy-inner{
            background:hsl(var(--primary-hsl),100%,96%);
            border:1px solid var(--primary-02);
            border-radius:15px;
        }
        .policy-section{
            padding:20px;
            border-bottom: 1px solid var(--primary-02);
        }
        h2{
            display:block;
            font-family:'bebas neue';
            font-size:2rem;
            color:var(--primary-dark);
        }
        .highlight-box{
            padding:20px;
            background:var(--primary-01);
            border-left: 4px solid var(--primary);

        }
        .warning-box{
            background:var(--primary-01);
            border:1px solid var(--primary-05);
            padding:20px;
            border-radius:15px;
            font-size:1rem;
        }
        .privacy-last-updated{
            border-left: 3px solid var(--primary);
            padding-left:10px;
        }
        .highlight-box.last{
            width:calc(100% - 40px);
            margin:20px
        }
        .data-grid{
            display:grid;
            gap:10px;
            place-items: center;
        }
        .data-card{
            display:flex;
            flex-direction:column;
            gap:10px;
            border:1px solid var(--primary-05);
            background: var(--primary-01);
            padding:15px;
            border-radius:15px;
        }
        .data-card svg{
            color:var(--primary);

        }
        .data-card strong{
            font-size:1.1rem;
            opacity:0.7;
            font-weight: 600;
        }
      ul{
        display:flex;
        flex-direction: column;
        gap:10px;
       }
        #how-we-use svg{
            height:16px;
            width:16px;
            color:var(--primary);
            margin-right: 8px;
           
        }
        #how-we-use strong{
            font-size:1rem;
            opacity:0.7;
        }
        @media(min-width:800px){
            .data-grid{
                grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
            }
        }
    </style>
@endsection
@section('main')
  <section class="w-full column">
   

<section class="privacy-hero">
  <div class="privacy-container">
    <div class="capsule">
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598L12 1ZM12 3.04879L5 4.60434V13.7889C5 15.1263 5.6684 16.3752 6.7812 17.1171L12 20.5963L17.2188 17.1171C18.3316 16.3752 19 15.1263 19 13.7889V4.60434L12 3.04879ZM12 7C13.1046 7 14 7.89543 14 9C14 9.73984 13.5983 10.3858 13.0011 10.7318L13 15H11L10.9999 10.7324C10.4022 10.3866 10 9.74025 10 9C10 7.89543 10.8954 7 12 7Z"></path></svg>
         Your trust matters
    </div>
    <h1 class="privacy-title">Privacy <span>Policy</span></h1>
    <p style="font-size: 18px; max-width: 700px; color: #5C4E3F;">WenorGigs is committed to protecting your personal data. This policy explains how we collect, use, and safeguard information when you use our daily tasks, spin, gift codes, VTU services, and marketplace.</p>
    <div class="privacy-last-updated">
      <i class="ri-calendar-line"></i> Last updated: May 18, 2026
    </div>
  </div>
</section>

<div class="policy-body">
  <div class="policy-inner">
    
    <div class="policy-section" id="information">
      <h2><i class="ri-database-2-line"></i> 1. Information We Collect</h2>
      <p>To provide you with a seamless earning and spending experience on WenorGigs (Daily Tasks, Spin Wheel, Gift Codes, Marketplace, VTU Services), we may collect the following categories of personal data:</p>
      <div class="data-grid">
        <div class="data-card">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"></path></svg>

            <strong>Account Data</strong>
            Name, email address, phone number, username, and profile photo.
        </div>
        <div class="data-card">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM20.0049 10.9998H4.00488V18.9998H20.0049V10.9998ZM20.0049 8.99979V4.99979H4.00488V8.99979H20.0049ZM14.0049 14.9998H18.0049V16.9998H14.0049V14.9998Z"></path></svg>

            <strong>Payment & Withdrawal Info</strong>
            Bank account details, mobile money credentials, transaction history.
        </div>
        <div class="data-card">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M7 4V20H17V4H7ZM6 2H18C18.5523 2 19 2.44772 19 3V21C19 21.5523 18.5523 22 18 22H6C5.44772 22 5 21.5523 5 21V3C5 2.44772 5.44772 2 6 2ZM12 17C12.5523 17 13 17.4477 13 18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18C11 17.4477 11.4477 17 12 17Z"></path></svg>

            <strong>Usage & Device</strong>
            IP address, device ID, browser type, app version, and interaction logs (tasks completed, spins, marketplace bids).
        </div>
        <div class="data-card">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

            <strong>Rewards & Codes</strong>
            Gift codes redeemed, spin results, referral earnings, and VTU purchase records.
        </div>
      </div>
      <p>We never intentionally collect sensitive personal data (health, biometrics, or political opinions). Any additional information you provide via support tickets is treated with confidentiality.</p>
    </div>

    <div class="policy-section" id="how-we-use">
      <h2><i class="ri-bar-chart-2-line"></i> 2. How We Use Your Information</h2>
      <p>Your information powers the WenorGigs ecosystem. Specifically, we use it to:</p>
      <ul>
        <li>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>
             <strong>Operate core features:</strong>
              Process daily task completions, spin entries, gift code validations, and marketplace transactions.
            </li>
        <li>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>
             <strong>VTU & withdrawals:</strong>
              Execute data, airtime, electricity token purchases and transfer earnings to your bank/wallet.
            </li>
        <li>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>
             <strong>Improve security:</strong>
              Detect fraudulent activity, prevent abuse of gift codes or spin mechanisms, and secure escrow payments.
            </li>
        <li>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>
             <strong>Communication:</strong> Send important service updates, daily gift code alerts, promotional offers (opt-out available).
            </li>
        <li>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>
             <strong>Analytics & growth:</strong>
              Understand user behavior to optimize reward systems and marketplace features.
            </li>
      </ul>
      <div class="highlight-box">
        <i class="ri-information-line" style="margin-right: 8px;"></i> <strong>Legal basis:</strong> We process your data based on contract necessity (providing WenorGigs services), legitimate interests (fraud prevention, platform improvements), and your consent (marketing communications).
      </div>
    </div>

    <div class="policy-section" id="data-sharing">
      <h2><i class="ri-share-forward-line"></i> 3. Data Sharing & Disclosure</h2>
      <p>We do not sell your personal information. However, we may share limited data with trusted third parties to operate WenorGigs effectively:</p>
      <ul>
        <li><strong>Service Providers:</strong> Payment gateways (bank transfers, mobile money), cloud hosting, analytics providers (e.g., Firebase, Mixpanel) that comply with strict data protection agreements.</li>
        <li><strong>Marketplace Counterparties:</strong> When you trade in the marketplace, your username and transaction rating are visible to other participants for transaction safety.</li>
        <li><strong>Legal Compliance:</strong> If required by law, court order, or governmental regulation, we may disclose information to relevant authorities.</li>
        <li><strong>Business Transfers:</strong> In the event of a merger or acquisition, user data may be transferred under the same privacy commitments.</li>
      </ul>
      <p>We require all third parties to respect the security of your data and treat it in accordance with the law.</p>
    </div>

    <div class="policy-section" id="cookies">
      <h2><i class="ri-cookie-line"></i> 4. Cookies & Tracking Technologies</h2>
      <p>WenorGigs uses cookies and similar tracking to enhance user experience, remember login sessions, and prevent spin/gift code fraud. You can manage cookie preferences via your browser settings, but disabling cookies may affect certain features like daily streaks or referral tracking.</p>
      <p>We also use local storage to save your theme preferences and temporary spin session data. No third-party advertising cookies are placed without explicit consent.</p>
    </div>

    <div class="policy-section" id="data-security">
      <h2><i class="ri-lock-password-line"></i> 5. Data Security & Retention</h2>
      <p>We implement robust technical and organizational measures: encryption in transit (TLS 1.3), hashed passwords, regular vulnerability scans, and access controls. However, no internet transmission is 100% secure; we encourage users to enable two-factor authentication where available.</p>
      <p><strong>Retention:</strong> We retain your personal data as long as your account is active or as necessary to provide services. After account closure, we keep transactional records for legal (tax, anti-fraud) up to 5 years, and anonymize analytic data after 12 months of inactivity.</p>
    </div>

    <div class="policy-section" id="user-rights">
      <h2><i class="ri-user-settings-line"></i> 6. Your Privacy Rights</h2>
      <p>Depending on your jurisdiction (GDPR, CCPA, or Nigeria Data Protection Act), you may have the right to:</p>
      <ul>
        <li><strong>Access</strong> – Request a copy of your personal data we hold.</li>
        <li><strong>Rectification</strong> – Correct inaccurate or incomplete information.</li>
        <li><strong>Erasure</strong> – Request deletion of your data (subject to legal obligations).</li>
        <li><strong>Restrict processing</strong> – Limit how we use your data in certain scenarios.</li>
        <li><strong>Data portability</strong> – Receive your data in a structured format.</li>
        <li><strong>Object to marketing</strong> – Opt-out of promotional emails via unsubscribe link.</li>
      </ul>
      <p>To exercise your rights, contact our Data Protection Officer at <strong>support@wenorgigs.int.ng</strong> or via in-app support. We respond within 30 days.</p>
      <div class="highlight-box">
        <i class="ri-mail-send-line"></i> For any data request or privacy concern, please email: <strong>support@wenorgigs.int.ng</strong> — we’re here to help.
      </div>
    </div>

    <div class="policy-section" id="children">
      <h2><i class="ri-parent-line"></i> 7. Children's Privacy</h2>
      <p>WenorGigs is not intended for users under the age of 13. We do not knowingly collect information from children. If you are a parent or guardian and believe your child has provided us with personal data, contact us immediately to remove the information.</p>
    </div>

    <div class="policy-section" id="international">
      <h2><i class="ri-global-line"></i> 8. International Transfers</h2>
      <p>Our servers may be located in different countries. When you use WenorGigs (including daily tasks, spins, VTU, marketplace), your data may be transferred to and processed in regions with different data protection laws. We ensure appropriate safeguards (Standard Contractual Clauses) are in place for such transfers.</p>
    </div>

    <div class="policy-section" id="policy-updates">
      <h2><i class="ri-refresh-line"></i> 9. Changes to This Privacy Policy</h2>
      <p>We may update this policy from time to time to reflect changes in our practices or legal requirements. The revised version will be indicated by an updated "Last updated" date and posted on this page. If changes are significant, we will notify you via email or in-app notification. Your continued use of WenorGigs after updates signifies your acceptance of the revised policy.</p>
    </div>

    <div class="policy-section" id="contact">
      <h2><i class="ri-customer-service-2-line"></i> 10. Contact Us</h2>
      <p>If you have any questions about this Privacy Policy or how your data is handled, please reach out:</p>
      <ul>
        <li><i class="ri-mail-line"></i> Email: <strong>support@wenorgigs.int.ng</strong></li>
         </ul>
    </div>

   
  </div>
</div>


  </section>
@endsection
@section('js')
    <script class="js">
        if(window.innerWidth > 800){
            let max_height=0;
            document.querySelectorAll('.data-card').forEach((data)=>{
                if(data.getBoundingClientRect().height > max_height){
                    max_height=data.getBoundingClientRect().height;
                }
            });
            document.querySelectorAll('.data-card').forEach((data)=>{
                data.style.height=max_height + 'px';
            
            })
        }
    </script>
@endsection