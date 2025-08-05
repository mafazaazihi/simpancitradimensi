<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col grid-margin stretch-card flex-column">
        <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
        <?= session()->getFlashdata('message'); ?>
        <div class="card shadow">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">Status statistics</h5>
                <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                          <p class="mb-0 text-muted">Transactions</p>
                          <p class="mb-0 text-muted">+1.37%</p>
                        </div>
                        <h4>1352</h4>
                        <canvas id="transactions-chart" class="mt-auto" height="65"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="row h-100">
                          <div class="col-6 d-flex flex-column justify-content-between">
                            <p class="text-muted">CPU</p>
                            <h4>55%</h4>
                            <canvas id="cpu-chart" class="mt-auto"></canvas>
                          </div>
                          <div class="col-6 d-flex flex-column justify-content-between">
                            <p class="text-muted">Memory</p>
                            <h4>123,65</h4>
                            <canvas id="memory-chart" class="mt-auto"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>