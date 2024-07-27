<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="{{ asset('css/stylelayanan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    @include('layouts.partials.headercust')
    <main>
        <div class="hero-section">
            <div class="hero-text">
                <h1 class="animate-fadein">Services</h1>
                <p class="animate-fadein-delay">Satya Management Consultant Services</p>
            </div>
        </div>
        <section class="service-section">
            <div class="container service-container justify-content-center">
                <div class="row justify-content-center animate-zoomin">
                    <div class="col-md-4 service">
                        <div class="card">
                            <img src="{{ asset('images/consulting1.png') }}" class="card-img-top"
                                alt="Financial&ManagementConsulting">
                            <div class="card-body">
                                <h5 class="card-title animate-fadein">Financial & Management Consulting</h5>
                                <p class="card-text animate-fadein-delay">Financial & Management Consulting is a service
                                    that helps organizations manage financial and operational aspects
                                    to improve business performance and efficiency, through analysis,
                                    strategic planning, risk management and restructuring.</p>
                                <a href="{{ route('consulting') }}" class="btn-card animate-zoomin">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 service">
                        <div class="card">
                            <img src="{{ asset('images/sop.png') }}" class="card-img-top"
                                alt="BusinessProcessFlowChartSOP">
                            <div class="card-body">
                                <h5 class="card-title animate-fadein">Business Process FlowChart SOP</h5>
                                <p class="card-text animate-fadein-delay">A SOP Business Process FlowChart is a visual
                                    tool that maps the steps in a standard operating procedure (SOP)
                                    to ensure business processes are executed consistently and
                                    efficiently, and helps identify areas for improvement.
                                </p>
                                <a href="{{ route('flowchart') }}" class="btn-card animate-zoomin">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 service">
                        <div class="card">
                            <img src="{{ asset('images/report.png') }}" class="card-img-top"
                                alt="FinancialReportTemplate">
                            <div class="card-body">
                                <h5 class="card-title animate-fadein">Financial Report Template</h5>
                                <p class="card-text animate-fadein-delay">A Financial Report Template is a tool used
                                    to prepare financial reports in a structured manner, including
                                    a balance sheet, profit and loss report, and cash flow report,
                                    which helps in presenting financial information efficiently and consistently.
                                </p>
                                <a href="{{ route('report') }}" class="btn-card animate-zoomin">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.partials.footercust')
    </main>
</body>

</html>
