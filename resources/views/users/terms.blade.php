@extends('layout.users.index')
@section('title')
    Terms of Service
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
        .terms-title{
            margin-top:20px;
            font-size:3rem;
            font-family:'bebas neue';
            display:inline-block;

        }
        .terms-title span{
            color:var(--primary);
        }
        .terms-hero{
            padding:20px;
            border-bottom: 1px solid var(--primary-02)
        }
        .terms-body{
            padding:20px;
            background:hsl(var(--primary-hsl),100%,93%)
        }
        .terms-inner{
            background:hsl(var(--primary-hsl),100%,96%);
            border:1px solid var(--primary-02);
            border-radius:15px;
        }
        .terms-section{
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
        .terms-last-updated{
            border-left: 3px solid var(--primary);
            padding-left:10px;
        }
        .highlight-box.last{
            width:calc(100% - 40px);
            margin:20px
        }
    </style>
@endsection
@section('main')
  <section class="w-full column">
   

<section class="terms-hero">
  <div class="terms-container">
    <div class="capsule">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M16 20V4H4V19C4 19.5523 4.44772 20 5 20H16ZM19 22H5C3.34315 22 2 20.6569 2 19V3C2 2.44772 2.44772 2 3 2H17C17.5523 2 18 2.44772 18 3V10H22V19C22 20.6569 20.6569 22 19 22ZM18 12V19C18 19.5523 18.4477 20 19 20C19.5523 20 20 19.5523 20 19V12H18ZM6 6H12V12H6V6ZM8 8V10H10V8H8ZM6 13H14V15H6V13ZM6 16H14V18H6V16Z"></path></svg>

      Legally binding agreement
    </div>
    <strong class="terms-title">Terms of <span>Service</span></strong>
    <p style="font-size: 1rem; max-width: 700px;opacity:0.5;">By accessing or using WenorGigs (daily tasks, spin wheel, gift codes, VTU services, and marketplace), you agree to be bound by these Terms. Please read carefully.</p>
    <div class="terms-last-updated">
       Effective date: May 18, 2026
    </div>
  </div>
</section>

<div class="terms-body">
  <div class="terms-inner">
    
    <div class="terms-section" id="acceptance">
      <h2> 1. Acceptance of Terms</h2>
      <p>Welcome to WenorGigs ("Platform", "we", "us", or "our"). These Terms of Service ("Terms") govern your access to and use of the WenorGigs website, mobile application, and related services including daily tasks, daily spin, gift code redemptions, peer-to-peer marketplace, VTU (data, airtime, electricity tokens), withdrawals, and any other features (collectively, "Services").</p>
      <p>By registering an account, accessing, or using our Services, you acknowledge that you have read, understood, and agree to be bound by these Terms. If you do not agree, please do not use WenorGigs.</p>
      <div class="highlight-box">
         <strong>Eligibility:</strong> You must be at least 18 years old or the age of majority in your jurisdiction to use our Services. By using WenorGigs, you represent that you meet this requirement.
      </div>
    </div>

    <div class="terms-section" id="account">
      <h2> 2. Account Registration & Security</h2>
      <p>To access core features (tasks, spins, marketplace, VTU), you must create an account. You agree to:</p>
      <ul>
        <li>Provide accurate, current, and complete information during registration.</li>
        <li>Maintain the security of your login credentials — you are responsible for all activities under your account.</li>
        <li>Notify us immediately of any unauthorized use or security breach.</li>
        <li>Not create multiple accounts to abuse referral bonuses, gift codes, or daily spin limits. We reserve the right to suspend duplicate or fraudulent accounts.</li>
      </ul>
      <p>WenorGigs may verify your identity (KYC) before processing large withdrawals or marketplace trades exceeding certain thresholds.</p>
    </div>

    <div class="terms-section" id="services">
      <h2> 3. Description of Services</h2>
      <p><strong>3.1 Daily Tasks:</strong> Users can complete simple actions (surveys, content views, social follows) to earn coins or cash rewards. Task availability and rewards may change daily. WenorGigs does not guarantee a minimum earning amount.</p>
      <p><strong>3.2 Daily Spin:</strong> Registered users may spin the wheel once per 24-hour period. Prizes include cash bonuses, gift codes, or in-app credits. Spin results are final and cannot be disputed. Abuse of spin mechanics (automation, VPN manipulation) leads to forfeiture of winnings.</p>
      <p><strong>3.3 Gift Codes:</strong> We distribute alphanumeric codes via social media, email, or events. Each code has an expiry date, usage limit, and can only be redeemed once per account. Codes are non-transferable and void if obtained through unauthorized channels.</p>
      <p><strong>3.4 Marketplace:</strong> Peer-to-peer trading zone for digital goods, gift cards, gaming items, and account services. WenorGigs acts solely as an intermediary; we do not guarantee the quality, legality, or delivery of items. Users trade at their own risk, though we provide escrow protection for eligible transactions (see section 5).</p>
      <p><strong>3.5 VTU Services:</strong> Purchase airtime, mobile data bundles, and electricity tokens via integrated third-party providers. Prices are dynamic; we strive to offer competitive rates but do not guarantee lowest price. All VTU sales are final — no refunds once token or data is delivered.</p>
      <p><strong>3.6 Withdrawals:</strong> Users may withdraw earned balances to bank accounts or mobile money. Minimum withdrawal thresholds apply (displayed in-app). Processing times vary (1–3 business days). WenorGigs reserves the right to hold withdrawals for security review.</p>
    </div>

    <div class="terms-section" id="user-conduct">
      <h2> 4. Prohibited Conduct</h2>
      <p>You agree NOT to:</p>
      <ul>
        <li>Use bots, scripts, or automated methods to complete tasks, spin the wheel, or redeem gift codes.</li>
        <li>Exploit bugs or vulnerabilities to generate unlimited rewards — doing so constitutes fraud and will result in permanent ban and forfeiture of all balances.</li>
        <li>Post fake listings on Marketplace, scam other users, or engage in chargeback fraud.</li>
        <li>Attempt to reverse-engineer, decompile, or copy any part of the WenorGigs platform.</li>
        <li>Use the platform for any illegal activity, including money laundering or terrorist financing.</li>
        <li>Harass, threaten, or abuse other users or WenorGigs support staff.</li>
      </ul>
      <div class="warning-box">
         <strong>Violation Consequences:</strong> We may suspend or terminate your account without prior notice, confiscate any unredeemed earnings, and report unlawful conduct to authorities.
      </div>
    </div>

    <div class="terms-section" id="marketplace">
      <h2> 5. Marketplace & Escrow Rules</h2>
      <p>WenorGigs facilitates an escrow protection for eligible digital goods. When a buyer initiates a trade, the amount is held until delivery confirmation. Sellers must provide proof of delivery. In case of dispute, our support team will investigate based on chat logs, screenshots, and delivery proofs. Escrow decisions are final.</p>
      <p>Listing fees: We may charge a small transaction fee (e.g., 2–5%) on successful trades, disclosed before listing. Users who attempt off-platform transactions to avoid fees will be banned.</p>
    </div>

    <div class="terms-section" id="payments">
      <h2> 6. Payments, Fees & Taxes</h2>
      <p>All rewards, spins, and gift code values are displayed in Nigerian Naira (₦) or equivalent local currency based on exchange rates. You are solely responsible for any taxes applicable to your earnings. WenorGigs does not provide tax advice.</p>
      <p>VTU purchases are processed via third-party payment gateways. We are not liable for delays or failures caused by network operators or electricity providers. Refunds for failed VTU transactions will be credited back to your WenorGigs wallet within 7 business days.</p>
    </div>

    <div class="terms-section" id="intellectual-property">
      <h2> 7. Intellectual Property</h2>
      <p>All content, logos, graphics, and software on WenorGigs are owned by us or our licensors. You may not copy, modify, or distribute any part of the platform without written consent. However, you retain ownership of any listings you create in the marketplace.</p>
    </div>

    <div class="terms-section" id="termination">
      <h2> 8. Termination & Suspension</h2>
      <p>You may delete your account at any time via settings. Upon deletion, any pending balance below the minimum withdrawal threshold will be forfeited. WenorGigs may suspend or terminate your account if:</p>
      <ul>
        <li>You breach any provision of these Terms.</li>
        <li>We suspect fraudulent activity or abuse of daily tasks / gift codes / spins.</li>
        <li>Required by law enforcement or regulatory authority.</li>
      </ul>
      <p>Upon termination, your right to use the Services ceases immediately, and any pending rewards may be revoked.</p>
    </div>

    <div class="terms-section" id="disclaimers">
      <h2> 9. Disclaimer of Warranties</h2>
      <p>WenorGigs provides the Services on an "AS IS" and "AS AVAILABLE" basis. We do not warrant that the platform will be uninterrupted, error-free, or free of viruses. We disclaim all warranties, express or implied, including merchantability, fitness for a particular purpose, and non-infringement.</p>
      <p>We are not responsible for any loss of earnings due to technical issues, server downtime, or third-party payment processor failures. Daily tasks and spin rewards are promotional in nature and may be modified or removed at our discretion.</p>
    </div>

    <div class="terms-section" id="limitation-liability">
      <h2> 10. Limitation of Liability</h2>
      <p>To the maximum extent permitted by law, WenorGigs and its affiliates shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including loss of profits, data, or goodwill, arising from your use of the platform. Our total aggregate liability shall not exceed the total amount you earned from WenorGigs in the six months preceding the claim.</p>
    </div>

    <div class="terms-section" id="indemnification">
      <h2> 11. Indemnification</h2>
      <p>You agree to indemnify and hold harmless WenorGigs, its officers, employees, and agents from any claims, damages, losses, or expenses (including legal fees) arising out of your violation of these Terms, your misuse of Services, or your violation of any third-party rights.</p>
    </div>

    <div class="terms-section" id="governing-law">
      <h2> 12. Governing Law & Dispute Resolution</h2>
      <p>These Terms shall be governed by the laws of the Federal Republic of Nigeria. Any dispute arising from these Terms or your use of WenorGigs shall first be attempted to be resolved through good-faith negotiation. If unresolved, disputes shall be submitted to binding arbitration in Lagos, Nigeria, in accordance with the Arbitration and Conciliation Act. Each party bears its own arbitration costs.</p>
    </div>

    <div class="terms-section" id="amendments">
      <h2> 13. Modifications to Terms</h2>
      <p>We may revise these Terms from time to time. The most current version will be posted with an updated "Effective date". If changes are material, we will notify you via email or in-app notification. Your continued use of WenorGigs after changes become effective constitutes your acceptance of the revised Terms.</p>
    </div>

    <div class="terms-section" id="contact">
      <h2> 14. Contact Information</h2>
      <p>For questions about these Terms, please contact our legal team:</p>
      <ul>
        <li> Email: <strong>support@wenorgigs.int.ng</strong></li>
      </ul>
    </div>

    <div class="highlight-box last">
       <strong>Thank you for being part of the WenorGigs community.</strong> Play fair, earn daily, and enjoy the spin! By using our platform, you confirm that you have read, understood, and agreed to these Terms of Service.
    </div>

  
  </div>
</div>

  </section>
@endsection