# Database & Domain Model Design Notes

## Purpose

This document explains the reasoning behind key database and domain model design decisions.
The goal is to avoid confusion in the future when this project is revisited or extended,
either by myself or other developers.

This documentation focuses on **why** certain relationships exist,
not merely **what** exists.

The document will be updated whenever a significant structural change is made.

---

## Model Overview

Total Models: **13**

### Core Identity
1. **User**  
   Represents authentication and account-level information for all users.

2. **RefreshToken**  
   Stores JWT refresh tokens to support multi-device authentication.

3. **Player**  
   A domain profile used to participate in tournaments and matches.
   Linked to a user account.

4. **Organizer**  
   A domain profile used to create and manage tournaments.
   Linked to a user account.

---

### Rating System
5. **PlayerRating**  
   Stores the current rating snapshot of a player per game.

6. **RatingEvent**  
   Records rating changes resulting from completed matches.
   Supports rating rollback by tracking deltas.

---

### Game & Tournament Domain
7. **Game**  
   Master data of supported games (e.g., Tekken, Street Fighter).

8. **GameCharacter**  
   Master data of playable characters per game.

9. **Tournament**  
   Represents a competition organized for a specific game.

10. **Participant**  
    Represents a player's participation in a tournament, including seeding.

---

### Match Structure
11. **Matchup**  
    Represents a competitive encounter between players in a tournament bracket.

12. **MatchGame**  
    Represents an individual game within a matchup (e.g., FT2, FT3).

13. **MatchGameCharacter**  
    Records character selection and usage per player per game.

---

## Relationship Summary (High Level)

- User ↔ Player / Organizer: one-to-one
- Player ↔ Tournament: many-to-many (via Participant)
- Player ↔ PlayerRating: one-to-many (per game)
- Player ↔ RatingEvent: one-to-many
- Tournament ↔ Matchup: one-to-many
- Matchup ↔ MatchGame: one-to-many
- MatchGame ↔ MatchGameCharacter: one-to-many

---

## Detailed Relationship Rationale

### User Relationships

**User → Player**  
- Relationship: one-to-one  
- Reason:  
  Authentication data is separated from gameplay-related data.
  A user may have a player profile without mixing domain data into auth logic.

**User → Organizer**  
- Relationship: one-to-one  
- Reason:  
  Organizing tournaments requires a separate domain profile with different responsibilities.

**User → RefreshToken**  
- Relationship: one-to-many  
- Reason:  
  Users may log in from multiple devices simultaneously.

---

### Player Relationships

**Player → Participant**  
- Relationship: one-to-many  
- Reason:  
  A player may participate in many tournaments over time.

**Player → PlayerRating**  
- Relationship: one-to-many  
- Reason:  
  Ratings are scoped per game.  
  A player has at most one active rating per game, enforced by a unique constraint.

**Player → RatingEvent**  
- Relationship: one-to-many  
- Reason:  
  A player’s rating may change multiple times due to different matches.

---

### Game Relationships

**Game → GameCharacter**  
- Relationship: one-to-many  
- Reason:  
  Each game supports multiple playable characters.

**Game → Tournament**  
- Relationship: one-to-many  
- Reason:  
  A single game can host multiple tournaments.

**Game → PlayerRating**  
- Relationship: one-to-many  
- Reason:  
  Many players may have ratings for the same game.

---

### Tournament & Match Relationships

**Tournament → Participant**  
- Relationship: one-to-many  
- Reason:  
  A tournament consists of multiple players.

**Tournament → Matchup**  
- Relationship: one-to-many  
- Reason:  
  Tournaments consist of multiple bracket encounters.

**Matchup → MatchGame**  
- Relationship: one-to-many  
- Reason:  
  A matchup may consist of multiple games depending on the format (BO3, BO5, etc).

**Matchup → RatingEvent**  
- Relationship: one-to-many  
- Reason:  
  Each matchup produces multiple rating changes (one per player).

**MatchGame → MatchGameCharacter**  
- Relationship: one-to-many  
- Reason:  
  Each game records character usage per participating player.

---

## Notes

- Database constraints represent **hard guarantees**
- Model relationships represent **application-level usage**
- Not all model relationships map 1:1 with database constraints
