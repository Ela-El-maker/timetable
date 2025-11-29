<template>
  <div class="dashboard">
    <header class="dashboard__header">
      <div>
        <p class="dashboard__subtitle">Admin Overview</p>
        <h1 class="dashboard__title">Timetable Control Center</h1>
        <p class="dashboard__description">
          Monitor user activity, timetable status, and conflicts from a single, responsive Vue.js view.
        </p>
      </div>
      <div class="dashboard__badge">Vue.js</div>
    </header>

    <section class="dashboard__grid">
      <article class="stat-card">
        <div class="stat-card__icon stat-card__icon--primary">👤</div>
        <div>
          <p class="stat-card__label">Total Users</p>
          <p class="stat-card__value">{{ totalUsers }}</p>
        </div>
      </article>

      <article class="stat-card">
        <div class="stat-card__icon stat-card__icon--accent">🔎</div>
        <div>
          <p class="stat-card__label">Total Searches</p>
          <p class="stat-card__value">{{ totalSearches }}</p>
        </div>
      </article>

      <article class="stat-card">
        <div class="stat-card__icon stat-card__icon--success">📅</div>
        <div>
          <p class="stat-card__label">Active Timetable</p>
          <p class="stat-card__value">{{ activeTimetable || 'None' }}</p>
        </div>
      </article>

      <article class="stat-card">
        <div class="stat-card__icon stat-card__icon--warning">⚠️</div>
        <div>
          <p class="stat-card__label">Conflicts Detected</p>
          <p class="stat-card__value">{{ conflictsDetected }}</p>
        </div>
      </article>
    </section>

    <section class="panel">
      <div class="panel__header">
        <h2 class="panel__title">Live System Status</h2>
        <p class="panel__subtitle">Synchronized with your Laravel data source</p>
      </div>
      <ul class="panel__list">
        <li class="panel__item">
          <span class="panel__dot"></span>
          <div>
            <p class="panel__label">User accounts remain synced with the Vue.js dashboard.</p>
            <p class="panel__hint">Pulled from the latest aggregated statistics.</p>
          </div>
        </li>
        <li class="panel__item">
          <span class="panel__dot"></span>
          <div>
            <p class="panel__label">Search volume metrics update immediately after deployment.</p>
            <p class="panel__hint">Track adoption across your timetable tools.</p>
          </div>
        </li>
        <li class="panel__item">
          <span class="panel__dot"></span>
          <div>
            <p class="panel__label">Timetable activation clearly highlights the active semester.</p>
            <p class="panel__hint">Current value: <strong>{{ activeTimetable || 'None' }}</strong>.</p>
          </div>
        </li>
        <li class="panel__item">
          <span class="panel__dot"></span>
          <div>
            <p class="panel__label">Conflict detection keeps your scheduling consistent.</p>
            <p class="panel__hint">Watch the count for spikes: <strong>{{ conflictsDetected }}</strong>.</p>
          </div>
        </li>
      </ul>
    </section>
  </div>
</template>

<script setup>
const props = defineProps({
  totalUsers: { type: Number, default: 0 },
  totalSearches: { type: Number, default: 0 },
  activeTimetable: { type: String, default: 'None' },
  conflictsDetected: { type: Number, default: 0 },
});
</script>

<style scoped>
.dashboard {
  min-height: 100vh;
  background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 50%, #e0f2fe 100%);
  color: #0f172a;
  padding: 2.5rem 1.5rem 3rem;
  font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

.dashboard__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  margin: 0 auto 2rem;
  max-width: 1100px;
}

.dashboard__subtitle {
  color: #475569;
  margin: 0;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  font-size: 0.9rem;
}

.dashboard__title {
  font-size: clamp(1.8rem, 3vw, 2.4rem);
  margin: 0.25rem 0;
  font-weight: 800;
  color: #0f172a;
}

.dashboard__description {
  margin: 0.35rem 0 0;
  color: #334155;
  max-width: 640px;
  line-height: 1.6;
}

.dashboard__badge {
  background: linear-gradient(135deg, #4f46e5, #7c3aed);
  color: #fff;
  padding: 0.45rem 0.9rem;
  border-radius: 999px;
  font-weight: 700;
  letter-spacing: 0.02em;
  box-shadow: 0 12px 30px -12px rgba(79, 70, 229, 0.45);
}

.dashboard__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 1rem;
  max-width: 1100px;
  margin: 0 auto 1.5rem;
}

.stat-card {
  background: #ffffff;
  border-radius: 1rem;
  padding: 1.25rem;
  display: flex;
  gap: 1rem;
  align-items: center;
  box-shadow: 0 10px 50px -30px rgba(15, 23, 42, 0.35);
  border: 1px solid #e2e8f0;
}

.stat-card__icon {
  width: 50px;
  height: 50px;
  border-radius: 14px;
  display: grid;
  place-items: center;
  font-size: 1.35rem;
  color: #0f172a;
  background: #e2e8f0;
}

.stat-card__icon--primary {
  background: #e0e7ff;
  color: #312e81;
}

.stat-card__icon--accent {
  background: #fee2e2;
  color: #991b1b;
}

.stat-card__icon--success {
  background: #dcfce7;
  color: #166534;
}

.stat-card__icon--warning {
  background: #fef3c7;
  color: #92400e;
}

.stat-card__label {
  margin: 0;
  color: #64748b;
  font-size: 0.95rem;
}

.stat-card__value {
  margin: 0.2rem 0 0;
  font-size: 1.4rem;
  font-weight: 800;
  color: #0f172a;
}

.panel {
  max-width: 1100px;
  margin: 0 auto;
  background: #0b1120;
  color: #e2e8f0;
  border-radius: 1.25rem;
  padding: 1.5rem;
  box-shadow: 0 20px 60px -35px rgba(15, 23, 42, 0.6);
}

.panel__header {
  margin-bottom: 1rem;
}

.panel__title {
  margin: 0;
  font-size: 1.35rem;
  font-weight: 800;
}

.panel__subtitle {
  margin: 0.35rem 0 0;
  color: #94a3b8;
}

.panel__list {
  list-style: none;
  padding: 0;
  margin: 1rem 0 0;
  display: grid;
  gap: 0.85rem;
}

.panel__item {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 0.75rem;
  align-items: start;
}

.panel__dot {
  width: 12px;
  height: 12px;
  margin-top: 0.5rem;
  background: linear-gradient(135deg, #22c55e, #14b8a6);
  border-radius: 999px;
  box-shadow: 0 8px 20px -10px rgba(20, 184, 166, 0.7);
}

.panel__label {
  margin: 0;
  font-weight: 700;
  color: #e2e8f0;
}

.panel__hint {
  margin: 0.25rem 0 0;
  color: #cbd5e1;
}

@media (max-width: 640px) {
  .dashboard__header {
    flex-direction: column;
    align-items: flex-start;
  }

  .panel {
    padding: 1.25rem;
  }
}
</style>
