  <?php
    include 'models/get_articles.php';

    $articles = getArticles($pdo);
  ?>


  <!DOCTYPE html>
  <html lang="fr">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin -- L'arabesque</title>
      <link rel="stylesheet" href="adminCss/style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link
          href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <script src="https://kit.fontawesome.com/fd20aa2b85.js" crossorigin="anonymous"></script>
  </head>

  <body>
      <main>
          <nav class="main-menu">
              <h1>Dashboard</h1>
              <img class="logo"
                  src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb"
                  alt="" />
              <ul>
                  <li class="nav-item active">
                      <b></b>
                      <b></b>
                      <a href="#">
                          <i class="fa fa-house nav-icon"></i>
                          <span class="nav-text">Home</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <b></b>
                      <b></b>
                      <a href="#">
                          <i class="fa fa-user nav-icon"></i>
                          <span class="nav-text">Profile</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <b></b>
                      <b></b>
                      <a href="#">
                          <i class="fa fa-calendar-check nav-icon"></i>
                          <span class="nav-text">Schedule</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <b></b>
                      <b></b>
                      <a href="#">
                          <i class="fa fa-person-running nav-icon"></i>
                          <span class="nav-text">Activities</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <b></b>
                      <b></b>
                      <a href="#">
                          <i class="fa fa-sliders nav-icon"></i>
                          <span class="nav-text">Settings</span>
                      </a>
                  </li>
              </ul>
          </nav>

          <section class="content2">
              <div class="left-content">
                  <div class="activities">
                      <div class="container">
                          <div class="container-title">
                              <h1>Liste des Articles</h1>
                          </div>
                          <?php if ($articles): ?>
                          <?php foreach ($articles as $article): ?>
                          <div class="article-container">
                              <div class="article">
                                  <?php if ($article['header_image']): ?>
                                  <img src="<?php echo htmlspecialchars($article['header_image']); ?>"
                                      alt="<?php echo htmlspecialchars($article['title']); ?>">
                                  <?php endif; ?>
                                  <div class="article-content">
                                      <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                                      <div class="meta">
                                          <span><?php echo date('d/m/Y', strtotime($article['created_at'])); ?></span>
                                          <span>10k vues</span>
                                      </div>
                                      <p><?php echo htmlspecialchars($article['category']); ?></p>
                                      <p><?php echo substr(strip_tags($article['content']), 0, 100); ?>...</p>
                                      <a href="index.php?page=article&id=<?php echo $article['id']; ?>"
                                          class="read-more">Read Article &rarr;</a>
                                  </div>
                              </div>
                          </div>
                          <?php endforeach; ?>
                          <?php else: ?>
                          <p>Aucun article trouvé.</p>
                          <?php endif; ?>
                      </div>

                      <div class="left-bottom">
                          <div class="weekly-schedule">
                              <h1>Weekly Schedule</h1>
                              <div class="calendar">
                                  <div class="day-and-activity activity-one">
                                      <div class="day">
                                          <h1>13</h1>
                                          <p>mon</p>
                                      </div>
                                      <div class="activity">
                                          <h2>Swimming</h2>
                                          <div class="participants">
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf"
                                                  style="--i: 1" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/90affa88-8da0-40c8-abe7-f77ea355a9de"
                                                  style="--i: 2" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e"
                                                  style="--i: 3" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e082b965-bb88-4192-bce6-0eb8b0bf8e68"
                                                  style="--i: 4" alt="" />
                                          </div>
                                      </div>
                                      <button class="btn">Join</button>
                                  </div>

                                  <div class="day-and-activity activity-two">
                                      <div class="day">
                                          <h1>15</h1>
                                          <p>wed</p>
                                      </div>
                                      <div class="activity">
                                          <h2>Yoga</h2>
                                          <div class="participants">
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf"
                                                  style="--i: 1" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9"
                                                  style="--i: 2" alt="" />
                                          </div>
                                      </div>
                                      <button class="btn">Join</button>
                                  </div>

                                  <div class="day-and-activity activity-three">
                                      <div class="day">
                                          <h1>17</h1>
                                          <p>fri</p>
                                      </div>
                                      <div class="activity">
                                          <h2>Tennis</h2>
                                          <div class="participants">
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9"
                                                  style="--i: 1" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e082b965-bb88-4192-bce6-0eb8b0bf8e68"
                                                  style="--i: 2" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf"
                                                  style="--i: 3" alt="" />
                                          </div>
                                      </div>
                                      <button class="btn">Join</button>
                                  </div>

                                  <div class="day-and-activity activity-four">
                                      <div class="day">
                                          <h1>18</h1>
                                          <p>sat</p>
                                      </div>
                                      <div class="activity">
                                          <h2>Hiking</h2>
                                          <div class="participants">
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e"
                                                  style="--i: 1" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9"
                                                  style="--i: 2" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e"
                                                  alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf"
                                                  style="--i: 4" alt="" />
                                              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/90affa88-8da0-40c8-abe7-f77ea355a9de"
                                                  style="--i: 5" alt="" />
                                          </div>
                                      </div>
                                      <button class="btn">Join</button>
                                  </div>
                              </div>
                          </div>

                          <div class="personal-bests">
                              <h1>Personal Bests</h1>
                              <div class="personal-bests-container">
                                  <div class="best-item box-one">
                                      <p>Fastest 5K Run: 22min</p>
                                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/242bbd8c-aaf8-4aee-a3e4-e0df62d1ab27"
                                          alt="" />
                                  </div>
                                  <div class="best-item box-two">
                                      <p>Longest Distance Cycling: 4 miles</p>
                                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/a3b3cb3a-5127-498b-91cc-a1d39499164a"
                                          alt="" />
                                  </div>
                                  <div class="best-item box-three">
                                      <p>Longest Roller-Skating: 2 hours</p>
                                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e0ee8ffb-faa8-462a-b44d-0a18c1d9604c"
                                          alt="" />
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="right-content">
                      <div class="user-info">
                          <div class="icon-container">
                              <i class="fa fa-bell nav-icon"></i>
                              <i class="fa fa-message nav-icon"></i>
                          </div>
                          <h4>Kelsey Miller</h4>
                          <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/40b7cce2-c289-4954-9be0-938479832a9c"
                              alt="user" />
                      </div>

                      <div class="active-calories">
                          <h1 style="align-self: flex-start">Active Calories</h1>
                          <div class="active-calories-container">
                              <div class="box" style="--i: 85%">
                                  <div class="circle">
                                      <h2>85<small>%</small></h2>
                                  </div>
                              </div>
                              <div class="calories-content">
                                  <p><span>Today:</span> 400</p>
                                  <p><span>This Week:</span> 3500</p>
                                  <p><span>This Month:</span> 14000</p>
                              </div>
                          </div>
                      </div>

                      <div class="mobile-personal-bests">
                          <h1>Personal Bests</h1>
                          <div class="personal-bests-container">
                              <div class="best-item box-one">
                                  <p>Fastest 5K Run: 22min</p>
                                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/05dfc444-9ed3-44cc-96af-a9cf195f5820"
                                      alt="" />
                              </div>
                              <div class="best-item box-two">
                                  <p>Longest Distance Cycling: 4 miles</p>
                                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9ca170e9-1252-4fa6-8677-36493540c1f2"
                                      alt="" />
                              </div>
                              <div class="best-item box-three">
                                  <p>Longest Roller-Skating: 2 hours</p>
                                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/262d1611-ed4c-4297-981c-480cf7f95714"
                                      alt="" />
                              </div>
                          </div>
                      </div>

                      <div class="friends-activity">
                          <h1>Friends Activity</h1>
                          <div class="card-container">
                              <div class="card">
                                  <div class="card-user-info">
                                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9290037d-a5b2-4f50-aea3-9f3f2b53b441"
                                          alt="" />
                                      <h2>Jane</h2>
                                  </div>
                                  <img class="card-img"
                                      src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/bef54506-ea45-4e42-a1b6-23a48f61c5e8"
                                      alt="" />
                                  <p>We completed the 30-Day Running Streak Challenge!🏃‍♀️🎉</p>
                              </div>

                              <div class="card card-two">
                                  <div class="card-user-info">
                                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/42616ef2-ba96-49c7-80ea-c3cf1e2ecc89"
                                          alt="" />
                                      <h2>Mike</h2>
                                  </div>
                                  <img class="card-img"
                                      src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/2dcc1b94-06c5-4c62-b886-53b9e433fd44"
                                      alt="" />
                                  <p>I just set a new record in cycling: 30 miles!💪</p>
                              </div>
                          </div>
                      </div>
                  </div>
          </section>
      </main>
      <script src="adminJs/scripts.js"></script>
  </body>

  </html>