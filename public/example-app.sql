-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 01:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(604, 32, 'North and Middle Andaman', 1, NULL, NULL),
(605, 32, 'South Andaman', 1, NULL, NULL),
(606, 32, 'Nicobar', 1, NULL, NULL),
(607, 1, 'Adilabad', 1, NULL, NULL),
(608, 1, 'Anantapur', 1, NULL, NULL),
(609, 1, 'Chittoor', 1, NULL, NULL),
(610, 1, 'East Godavari', 1, NULL, NULL),
(611, 1, 'Guntur', 1, NULL, NULL),
(612, 1, 'Hyderabad', 1, NULL, NULL),
(613, 1, 'Kadapa', 1, NULL, NULL),
(614, 1, 'Karimnagar', 1, NULL, NULL),
(615, 1, 'Khammam', 1, NULL, NULL),
(616, 1, 'Krishna', 1, NULL, NULL),
(617, 1, 'Kurnool', 1, NULL, NULL),
(618, 1, 'Mahbubnagar', 1, NULL, NULL),
(619, 1, 'Medak', 1, NULL, NULL),
(620, 1, 'Nalgonda', 1, NULL, NULL),
(621, 1, 'Nellore', 1, NULL, NULL),
(622, 1, 'Nizamabad', 1, NULL, NULL),
(623, 1, 'Prakasam', 1, NULL, NULL),
(624, 1, 'Rangareddi', 1, NULL, NULL),
(625, 1, 'Srikakulam', 1, NULL, NULL),
(626, 1, 'Vishakhapatnam', 1, NULL, NULL),
(627, 1, 'Vizianagaram', 1, NULL, NULL),
(628, 1, 'Warangal', 1, NULL, NULL),
(629, 1, 'West Godavari', 1, NULL, NULL),
(630, 3, 'Anjaw', 1, NULL, NULL),
(631, 3, 'Changlang', 1, NULL, NULL),
(632, 3, 'East Kameng', 1, NULL, NULL),
(633, 3, 'Lohit', 1, NULL, NULL),
(634, 3, 'Lower Subansiri', 1, NULL, NULL),
(635, 3, 'Papum Pare', 1, NULL, NULL),
(636, 3, 'Tirap', 1, NULL, NULL),
(637, 3, 'Dibang Valley', 1, NULL, NULL),
(638, 3, 'Upper Subansiri', 1, NULL, NULL),
(639, 3, 'West Kameng', 1, NULL, NULL),
(640, 2, 'Barpeta', 1, NULL, NULL),
(641, 2, 'Bongaigaon', 1, NULL, NULL),
(642, 2, 'Cachar', 1, NULL, NULL),
(643, 2, 'Darrang', 1, NULL, NULL),
(644, 2, 'Dhemaji', 1, NULL, NULL),
(645, 2, 'Dhubri', 1, NULL, NULL),
(646, 2, 'Dibrugarh', 1, NULL, NULL),
(647, 2, 'Goalpara', 1, NULL, NULL),
(648, 2, 'Golaghat', 1, NULL, NULL),
(649, 2, 'Hailakandi', 1, NULL, NULL),
(650, 2, 'Jorhat', 1, NULL, NULL),
(651, 2, 'Karbi Anglong', 1, NULL, NULL),
(652, 2, 'Karimganj', 1, NULL, NULL),
(653, 2, 'Kokrajhar', 1, NULL, NULL),
(654, 2, 'Lakhimpur', 1, NULL, NULL),
(655, 2, 'Marigaon', 1, NULL, NULL),
(656, 2, 'Nagaon', 1, NULL, NULL),
(657, 2, 'Nalbari', 1, NULL, NULL),
(658, 2, 'North Cachar Hills', 1, NULL, NULL),
(659, 2, 'Sibsagar', 1, NULL, NULL),
(660, 2, 'Sonitpur', 1, NULL, NULL),
(661, 2, 'Tinsukia', 1, NULL, NULL),
(662, 4, 'Araria', 1, NULL, NULL),
(663, 4, 'Aurangabad', 1, NULL, NULL),
(664, 4, 'Banka', 1, NULL, NULL),
(665, 4, 'Begusarai', 1, NULL, NULL),
(666, 4, 'Bhagalpur', 1, NULL, NULL),
(667, 4, 'Bhojpur', 1, NULL, NULL),
(668, 4, 'Buxar', 1, NULL, NULL),
(669, 4, 'Darbhanga', 1, NULL, NULL),
(670, 4, 'Purba Champaran', 1, NULL, NULL),
(671, 4, 'Gaya', 1, NULL, NULL),
(672, 4, 'Gopalganj', 1, NULL, NULL),
(673, 4, 'Jamui', 1, NULL, NULL),
(674, 4, 'Jehanabad', 1, NULL, NULL),
(675, 4, 'Khagaria', 1, NULL, NULL),
(676, 4, 'Kishanganj', 1, NULL, NULL),
(677, 4, 'Kaimur', 1, NULL, NULL),
(678, 4, 'Katihar', 1, NULL, NULL),
(679, 4, 'Lakhisarai', 1, NULL, NULL),
(680, 4, 'Madhubani', 1, NULL, NULL),
(681, 4, 'Munger', 1, NULL, NULL),
(682, 4, 'Madhepura', 1, NULL, NULL),
(683, 4, 'Muzaffarpur', 1, NULL, NULL),
(684, 4, 'Nalanda', 1, NULL, NULL),
(685, 4, 'Nawada', 1, NULL, NULL),
(686, 4, 'Patna', 1, NULL, NULL),
(687, 4, 'Purnia', 1, NULL, NULL),
(688, 4, 'Rohtas', 1, NULL, NULL),
(689, 4, 'Saharsa', 1, NULL, NULL),
(690, 4, 'Samastipur', 1, NULL, NULL),
(691, 4, 'Sheohar', 1, NULL, NULL),
(692, 4, 'Sheikhpura', 1, NULL, NULL),
(693, 4, 'Saran', 1, NULL, NULL),
(694, 4, 'Sitamarhi', 1, NULL, NULL),
(695, 4, 'Supaul', 1, NULL, NULL),
(696, 4, 'Siwan', 1, NULL, NULL),
(697, 4, 'Vaishali', 1, NULL, NULL),
(698, 4, 'Pashchim Champaran', 1, NULL, NULL),
(699, 29, 'Diu', 1, NULL, NULL),
(700, 29, 'Daman', 1, NULL, NULL),
(701, 25, 'Central Delhi', 1, NULL, NULL),
(702, 25, 'East Delhi', 1, NULL, NULL),
(703, 25, 'New Delhi', 1, NULL, NULL),
(704, 25, 'North Delhi', 1, NULL, NULL),
(705, 25, 'North East Delhi', 1, NULL, NULL),
(706, 25, 'North West Delhi', 1, NULL, NULL),
(707, 25, 'South Delhi', 1, NULL, NULL),
(708, 25, 'South West Delhi', 1, NULL, NULL),
(709, 25, 'West Delhi', 1, NULL, NULL),
(710, 26, 'North Goa', 1, NULL, NULL),
(711, 26, 'South Goa', 1, NULL, NULL),
(712, 5, 'Ahmedabad', 1, NULL, NULL),
(713, 5, 'Amreli District', 1, NULL, NULL),
(714, 5, 'Anand', 1, NULL, NULL),
(715, 5, 'Banaskantha', 1, NULL, NULL),
(716, 5, 'Bharuch', 1, NULL, NULL),
(717, 5, 'Bhavnagar', 1, NULL, NULL),
(718, 5, 'Dahod', 1, NULL, NULL),
(719, 5, 'The Dangs', 1, NULL, NULL),
(720, 5, 'Gandhinagar', 1, NULL, NULL),
(721, 5, 'Jamnagar', 1, NULL, NULL),
(722, 5, 'Junagadh', 1, NULL, NULL),
(723, 5, 'Kutch', 1, NULL, NULL),
(724, 5, 'Kheda', 1, NULL, NULL),
(725, 5, 'Mehsana', 1, NULL, NULL),
(726, 5, 'Narmada', 1, NULL, NULL),
(727, 5, 'Navsari', 1, NULL, NULL),
(728, 5, 'Patan', 1, NULL, NULL),
(729, 5, 'Panchmahal', 1, NULL, NULL),
(730, 5, 'Porbandar', 1, NULL, NULL),
(731, 5, 'Rajkot', 1, NULL, NULL),
(732, 5, 'Sabarkantha', 1, NULL, NULL),
(733, 5, 'Surendranagar', 1, NULL, NULL),
(734, 5, 'Surat', 1, NULL, NULL),
(735, 5, 'Vadodara', 1, NULL, NULL),
(736, 5, 'Valsad', 1, NULL, NULL),
(737, 6, 'Ambala', 1, NULL, NULL),
(738, 6, 'Bhiwani', 1, NULL, NULL),
(739, 6, 'Faridabad', 1, NULL, NULL),
(740, 6, 'Fatehabad', 1, NULL, NULL),
(741, 6, 'Gurgaon', 1, NULL, NULL),
(742, 6, 'Hissar', 1, NULL, NULL),
(743, 6, 'Jhajjar', 1, NULL, NULL),
(744, 6, 'Jind', 1, NULL, NULL),
(745, 6, 'Karnal', 1, NULL, NULL),
(746, 6, 'Kaithal', 1, NULL, NULL),
(747, 6, 'Kurukshetra', 1, NULL, NULL),
(748, 6, 'Mahendragarh', 1, NULL, NULL),
(749, 6, 'Mewat', 1, NULL, NULL),
(750, 6, 'Panchkula', 1, NULL, NULL),
(751, 6, 'Panipat', 1, NULL, NULL),
(752, 6, 'Rewari', 1, NULL, NULL),
(753, 6, 'Rohtak', 1, NULL, NULL),
(754, 6, 'Sirsa', 1, NULL, NULL),
(755, 6, 'Sonepat', 1, NULL, NULL),
(756, 6, 'Yamuna Nagar', 1, NULL, NULL),
(757, 6, 'Palwal', 1, NULL, NULL),
(758, 7, 'Bilaspur', 1, NULL, NULL),
(759, 7, 'Chamba', 1, NULL, NULL),
(760, 7, 'Hamirpur', 1, NULL, NULL),
(761, 7, 'Kangra', 1, NULL, NULL),
(762, 7, 'Kinnaur', 1, NULL, NULL),
(763, 7, 'Kulu', 1, NULL, NULL),
(764, 7, 'Lahaul and Spiti', 1, NULL, NULL),
(765, 7, 'Mandi', 1, NULL, NULL),
(766, 7, 'Shimla', 1, NULL, NULL),
(767, 7, 'Sirmaur', 1, NULL, NULL),
(768, 7, 'Solan', 1, NULL, NULL),
(769, 7, 'Una', 1, NULL, NULL),
(770, 8, 'Anantnag', 1, NULL, NULL),
(771, 8, 'Badgam', 1, NULL, NULL),
(772, 8, 'Bandipore', 1, NULL, NULL),
(773, 8, 'Baramula', 1, NULL, NULL),
(774, 8, 'Doda', 1, NULL, NULL),
(775, 8, 'Jammu', 1, NULL, NULL),
(776, 8, 'Kargil', 1, NULL, NULL),
(777, 8, 'Kathua', 1, NULL, NULL),
(778, 8, 'Kupwara', 1, NULL, NULL),
(779, 8, 'Leh', 1, NULL, NULL),
(780, 8, 'Poonch', 1, NULL, NULL),
(781, 8, 'Pulwama', 1, NULL, NULL),
(782, 8, 'Rajauri', 1, NULL, NULL),
(783, 8, 'Srinagar', 1, NULL, NULL),
(784, 8, 'Samba', 1, NULL, NULL),
(785, 8, 'Udhampur', 1, NULL, NULL),
(786, 34, 'Bokaro', 1, NULL, NULL),
(787, 34, 'Chatra', 1, NULL, NULL),
(788, 34, 'Deoghar', 1, NULL, NULL),
(789, 34, 'Dhanbad', 1, NULL, NULL),
(790, 34, 'Dumka', 1, NULL, NULL),
(791, 34, 'Purba Singhbhum', 1, NULL, NULL),
(792, 34, 'Garhwa', 1, NULL, NULL),
(793, 34, 'Giridih', 1, NULL, NULL),
(794, 34, 'Godda', 1, NULL, NULL),
(795, 34, 'Gumla', 1, NULL, NULL),
(796, 34, 'Hazaribagh', 1, NULL, NULL),
(797, 34, 'Koderma', 1, NULL, NULL),
(798, 34, 'Lohardaga', 1, NULL, NULL),
(799, 34, 'Pakur', 1, NULL, NULL),
(800, 34, 'Palamu', 1, NULL, NULL),
(801, 34, 'Ranchi', 1, NULL, NULL),
(802, 34, 'Sahibganj', 1, NULL, NULL),
(803, 34, 'Seraikela and Kharsawan', 1, NULL, NULL),
(804, 34, 'Pashchim Singhbhum', 1, NULL, NULL),
(805, 34, 'Ramgarh', 1, NULL, NULL),
(806, 9, 'Bidar', 1, NULL, NULL),
(807, 9, 'Belgaum', 1, NULL, NULL),
(808, 9, 'Bijapur', 1, NULL, NULL),
(809, 9, 'Bagalkot', 1, NULL, NULL),
(810, 9, 'Bellary', 1, NULL, NULL),
(811, 9, 'Bangalore Rural District', 1, NULL, NULL),
(812, 9, 'Bangalore Urban District', 1, NULL, NULL),
(813, 9, 'Chamarajnagar', 1, NULL, NULL),
(814, 9, 'Chikmagalur', 1, NULL, NULL),
(815, 9, 'Chitradurga', 1, NULL, NULL),
(816, 9, 'Davanagere', 1, NULL, NULL),
(817, 9, 'Dharwad', 1, NULL, NULL),
(818, 9, 'Dakshina Kannada', 1, NULL, NULL),
(819, 9, 'Gadag', 1, NULL, NULL),
(820, 9, 'Gulbarga', 1, NULL, NULL),
(821, 9, 'Hassan', 1, NULL, NULL),
(822, 9, 'Haveri District', 1, NULL, NULL),
(823, 9, 'Kodagu', 1, NULL, NULL),
(824, 9, 'Kolar', 1, NULL, NULL),
(825, 9, 'Koppal', 1, NULL, NULL),
(826, 9, 'Mandya', 1, NULL, NULL),
(827, 9, 'Mysore', 1, NULL, NULL),
(828, 9, 'Raichur', 1, NULL, NULL),
(829, 9, 'Shimoga', 1, NULL, NULL),
(830, 9, 'Tumkur', 1, NULL, NULL),
(831, 9, 'Udupi', 1, NULL, NULL),
(832, 9, 'Uttara Kannada', 1, NULL, NULL),
(833, 9, 'Ramanagara', 1, NULL, NULL),
(834, 9, 'Chikballapur', 1, NULL, NULL),
(835, 9, 'Yadagiri', 1, NULL, NULL),
(836, 10, 'Alappuzha', 1, NULL, NULL),
(837, 10, 'Ernakulam', 1, NULL, NULL),
(838, 10, 'Idukki', 1, NULL, NULL),
(839, 10, 'Kollam', 1, NULL, NULL),
(840, 10, 'Kannur', 1, NULL, NULL),
(841, 10, 'Kasaragod', 1, NULL, NULL),
(842, 10, 'Kottayam', 1, NULL, NULL),
(843, 10, 'Kozhikode', 1, NULL, NULL),
(844, 10, 'Malappuram', 1, NULL, NULL),
(845, 10, 'Palakkad', 1, NULL, NULL),
(846, 10, 'Pathanamthitta', 1, NULL, NULL),
(847, 10, 'Thrissur', 1, NULL, NULL),
(848, 10, 'Thiruvananthapuram', 1, NULL, NULL),
(849, 10, 'Wayanad', 1, NULL, NULL),
(850, 11, 'Alirajpur', 1, NULL, NULL),
(851, 11, 'Anuppur', 1, NULL, NULL),
(852, 11, 'Ashok Nagar', 1, NULL, NULL),
(853, 11, 'Balaghat', 1, NULL, NULL),
(854, 11, 'Barwani', 1, NULL, NULL),
(855, 11, 'Betul', 1, NULL, NULL),
(856, 11, 'Bhind', 1, NULL, NULL),
(857, 11, 'Bhopal', 1, NULL, NULL),
(858, 11, 'Burhanpur', 1, NULL, NULL),
(859, 11, 'Chhatarpur', 1, NULL, NULL),
(860, 11, 'Chhindwara', 1, NULL, NULL),
(861, 11, 'Damoh', 1, NULL, NULL),
(862, 11, 'Datia', 1, NULL, NULL),
(863, 11, 'Dewas', 1, NULL, NULL),
(864, 11, 'Dhar', 1, NULL, NULL),
(865, 11, 'Dindori', 1, NULL, NULL),
(866, 11, 'Guna', 1, NULL, NULL),
(867, 11, 'Gwalior', 1, NULL, NULL),
(868, 11, 'Harda', 1, NULL, NULL),
(869, 11, 'Hoshangabad', 1, NULL, NULL),
(870, 11, 'Indore', 1, NULL, NULL),
(871, 11, 'Jabalpur', 1, NULL, NULL),
(872, 11, 'Jhabua', 1, NULL, NULL),
(873, 11, 'Katni', 1, NULL, NULL),
(874, 11, 'Khandwa', 1, NULL, NULL),
(875, 11, 'Khargone', 1, NULL, NULL),
(876, 11, 'Mandla', 1, NULL, NULL),
(877, 11, 'Mandsaur', 1, NULL, NULL),
(878, 11, 'Morena', 1, NULL, NULL),
(879, 11, 'Narsinghpur', 1, NULL, NULL),
(880, 11, 'Neemuch', 1, NULL, NULL),
(881, 11, 'Panna', 1, NULL, NULL),
(882, 11, 'Rewa', 1, NULL, NULL),
(883, 11, 'Rajgarh', 1, NULL, NULL),
(884, 11, 'Ratlam', 1, NULL, NULL),
(885, 11, 'Raisen', 1, NULL, NULL),
(886, 11, 'Sagar', 1, NULL, NULL),
(887, 11, 'Satna', 1, NULL, NULL),
(888, 11, 'Sehore', 1, NULL, NULL),
(889, 11, 'Seoni', 1, NULL, NULL),
(890, 11, 'Shahdol', 1, NULL, NULL),
(891, 11, 'Shajapur', 1, NULL, NULL),
(892, 11, 'Sheopur', 1, NULL, NULL),
(893, 11, 'Shivpuri', 1, NULL, NULL),
(894, 11, 'Sidhi', 1, NULL, NULL),
(895, 11, 'Singrauli', 1, NULL, NULL),
(896, 11, 'Tikamgarh', 1, NULL, NULL),
(897, 11, 'Ujjain', 1, NULL, NULL),
(898, 11, 'Umaria', 1, NULL, NULL),
(899, 11, 'Vidisha', 1, NULL, NULL),
(900, 12, 'Ahmednagar', 1, NULL, NULL),
(901, 12, 'Akola', 1, NULL, NULL),
(902, 12, 'Amrawati', 1, NULL, NULL),
(903, 12, 'Aurangabad', 1, NULL, NULL),
(904, 12, 'Bhandara', 1, NULL, NULL),
(905, 12, 'Beed', 1, NULL, NULL),
(906, 12, 'Buldhana', 1, NULL, NULL),
(907, 12, 'Chandrapur', 1, NULL, NULL),
(908, 12, 'Dhule', 1, NULL, NULL),
(909, 12, 'Gadchiroli', 1, NULL, NULL),
(910, 12, 'Gondiya', 1, NULL, NULL),
(911, 12, 'Hingoli', 1, NULL, NULL),
(912, 12, 'Jalgaon', 1, NULL, NULL),
(913, 12, 'Jalna', 1, NULL, NULL),
(914, 12, 'Kolhapur', 1, NULL, NULL),
(915, 12, 'Latur', 1, NULL, NULL),
(916, 12, 'Mumbai City', 1, NULL, NULL),
(917, 12, 'Mumbai suburban', 1, NULL, NULL),
(918, 12, 'Nandurbar', 1, NULL, NULL),
(919, 12, 'Nanded', 1, NULL, NULL),
(920, 12, 'Nagpur', 1, NULL, NULL),
(921, 12, 'Nashik', 1, NULL, NULL),
(922, 12, 'Osmanabad', 1, NULL, NULL),
(923, 12, 'Parbhani', 1, NULL, NULL),
(924, 12, 'Pune', 1, NULL, NULL),
(925, 12, 'Raigad', 1, NULL, NULL),
(926, 12, 'Ratnagiri', 1, NULL, NULL),
(927, 12, 'Sindhudurg', 1, NULL, NULL),
(928, 12, 'Sangli', 1, NULL, NULL),
(929, 12, 'Solapur', 1, NULL, NULL),
(930, 12, 'Satara', 1, NULL, NULL),
(931, 12, 'Thane', 1, NULL, NULL),
(932, 12, 'Wardha', 1, NULL, NULL),
(933, 12, 'Washim', 1, NULL, NULL),
(934, 12, 'Yavatmal', 1, NULL, NULL),
(935, 13, 'Bishnupur', 1, NULL, NULL),
(936, 13, 'Churachandpur', 1, NULL, NULL),
(937, 13, 'Chandel', 1, NULL, NULL),
(938, 13, 'Imphal East', 1, NULL, NULL),
(939, 13, 'Senapati', 1, NULL, NULL),
(940, 13, 'Tamenglong', 1, NULL, NULL),
(941, 13, 'Thoubal', 1, NULL, NULL),
(942, 13, 'Ukhrul', 1, NULL, NULL),
(943, 13, 'Imphal West', 1, NULL, NULL),
(944, 14, 'East Garo Hills', 1, NULL, NULL),
(945, 14, 'East Khasi Hills', 1, NULL, NULL),
(946, 14, 'Jaintia Hills', 1, NULL, NULL),
(947, 14, 'Ri-Bhoi', 1, NULL, NULL),
(948, 14, 'South Garo Hills', 1, NULL, NULL),
(949, 14, 'West Garo Hills', 1, NULL, NULL),
(950, 14, 'West Khasi Hills', 1, NULL, NULL),
(951, 15, 'Aizawl', 1, NULL, NULL),
(952, 15, 'Champhai', 1, NULL, NULL),
(953, 15, 'Kolasib', 1, NULL, NULL),
(954, 15, 'Lawngtlai', 1, NULL, NULL),
(955, 15, 'Lunglei', 1, NULL, NULL),
(956, 15, 'Mamit', 1, NULL, NULL),
(957, 15, 'Saiha', 1, NULL, NULL),
(958, 15, 'Serchhip', 1, NULL, NULL),
(959, 16, 'Dimapur', 1, NULL, NULL),
(960, 16, 'Kohima', 1, NULL, NULL),
(961, 16, 'Mokokchung', 1, NULL, NULL),
(962, 16, 'Mon', 1, NULL, NULL),
(963, 16, 'Phek', 1, NULL, NULL),
(964, 16, 'Tuensang', 1, NULL, NULL),
(965, 16, 'Wokha', 1, NULL, NULL),
(966, 16, 'Zunheboto', 1, NULL, NULL),
(967, 17, 'Angul', 1, NULL, NULL),
(968, 17, 'Boudh', 1, NULL, NULL),
(969, 17, 'Bhadrak', 1, NULL, NULL),
(970, 17, 'Bolangir', 1, NULL, NULL),
(971, 17, 'Bargarh', 1, NULL, NULL),
(972, 17, 'Baleswar', 1, NULL, NULL),
(973, 17, 'Cuttack', 1, NULL, NULL),
(974, 17, 'Debagarh', 1, NULL, NULL),
(975, 17, 'Dhenkanal', 1, NULL, NULL),
(976, 17, 'Ganjam', 1, NULL, NULL),
(977, 17, 'Gajapati', 1, NULL, NULL),
(978, 17, 'Jharsuguda', 1, NULL, NULL),
(979, 17, 'Jajapur', 1, NULL, NULL),
(980, 17, 'Jagatsinghpur', 1, NULL, NULL),
(981, 17, 'Khordha', 1, NULL, NULL),
(982, 17, 'Kendujhar', 1, NULL, NULL),
(983, 17, 'Kalahandi', 1, NULL, NULL),
(984, 17, 'Kandhamal', 1, NULL, NULL),
(985, 17, 'Koraput', 1, NULL, NULL),
(986, 17, 'Kendrapara', 1, NULL, NULL),
(987, 17, 'Malkangiri', 1, NULL, NULL),
(988, 17, 'Mayurbhanj', 1, NULL, NULL),
(989, 17, 'Nabarangpur', 1, NULL, NULL),
(990, 17, 'Nuapada', 1, NULL, NULL),
(991, 17, 'Nayagarh', 1, NULL, NULL),
(992, 17, 'Puri', 1, NULL, NULL),
(993, 17, 'Rayagada', 1, NULL, NULL),
(994, 17, 'Sambalpur', 1, NULL, NULL),
(995, 17, 'Subarnapur', 1, NULL, NULL),
(996, 17, 'Sundargarh', 1, NULL, NULL),
(997, 27, 'Karaikal', 1, NULL, NULL),
(998, 27, 'Mahe', 1, NULL, NULL),
(999, 27, 'Puducherry', 1, NULL, NULL),
(1000, 27, 'Yanam', 1, NULL, NULL),
(1001, 18, 'Amritsar', 1, NULL, NULL),
(1002, 18, 'Bathinda', 1, NULL, NULL),
(1003, 18, 'Firozpur', 1, NULL, NULL),
(1004, 18, 'Faridkot', 1, NULL, NULL),
(1005, 18, 'Fatehgarh Sahib', 1, NULL, NULL),
(1006, 18, 'Gurdaspur', 1, NULL, NULL),
(1007, 18, 'Hoshiarpur', 1, NULL, NULL),
(1008, 18, 'Jalandhar', 1, NULL, NULL),
(1009, 18, 'Kapurthala', 1, NULL, NULL),
(1010, 18, 'Ludhiana', 1, NULL, NULL),
(1011, 18, 'Mansa', 1, NULL, NULL),
(1012, 18, 'Moga', 1, NULL, NULL),
(1013, 18, 'Mukatsar', 1, NULL, NULL),
(1014, 18, 'Nawan Shehar', 1, NULL, NULL),
(1015, 18, 'Patiala', 1, NULL, NULL),
(1016, 18, 'Rupnagar', 1, NULL, NULL),
(1017, 18, 'Sangrur', 1, NULL, NULL),
(1018, 19, 'Ajmer', 1, NULL, NULL),
(1019, 19, 'Alwar', 1, NULL, NULL),
(1020, 19, 'Bikaner', 1, NULL, NULL),
(1021, 19, 'Barmer', 1, NULL, NULL),
(1022, 19, 'Banswara', 1, NULL, NULL),
(1023, 19, 'Bharatpur', 1, NULL, NULL),
(1024, 19, 'Baran', 1, NULL, NULL),
(1025, 19, 'Bundi', 1, NULL, NULL),
(1026, 19, 'Bhilwara', 1, NULL, NULL),
(1027, 19, 'Churu', 1, NULL, NULL),
(1028, 19, 'Chittorgarh', 1, NULL, NULL),
(1029, 19, 'Dausa', 1, NULL, NULL),
(1030, 19, 'Dholpur', 1, NULL, NULL),
(1031, 19, 'Dungapur', 1, NULL, NULL),
(1032, 19, 'Ganganagar', 1, NULL, NULL),
(1033, 19, 'Hanumangarh', 1, NULL, NULL),
(1034, 19, 'Juhnjhunun', 1, NULL, NULL),
(1035, 19, 'Jalore', 1, NULL, NULL),
(1036, 19, 'Jodhpur', 1, NULL, NULL),
(1037, 19, 'Jaipur', 1, NULL, NULL),
(1038, 19, 'Jaisalmer', 1, NULL, NULL),
(1039, 19, 'Jhalawar', 1, NULL, NULL),
(1040, 19, 'Karauli', 1, NULL, NULL),
(1041, 19, 'Kota', 1, NULL, NULL),
(1042, 19, 'Nagaur', 1, NULL, NULL),
(1043, 19, 'Pali', 1, NULL, NULL),
(1044, 19, 'Pratapgarh', 1, NULL, NULL),
(1045, 19, 'Rajsamand', 1, NULL, NULL),
(1046, 19, 'Sikar', 1, NULL, NULL),
(1047, 19, 'Sawai Madhopur', 1, NULL, NULL),
(1048, 19, 'Sirohi', 1, NULL, NULL),
(1049, 19, 'Tonk', 1, NULL, NULL),
(1050, 19, 'Udaipur', 1, NULL, NULL),
(1051, 20, 'East Sikkim', 1, NULL, NULL),
(1052, 20, 'North Sikkim', 1, NULL, NULL),
(1053, 20, 'South Sikkim', 1, NULL, NULL),
(1054, 20, 'West Sikkim', 1, NULL, NULL),
(1055, 21, 'Ariyalur', 1, NULL, NULL),
(1056, 21, 'Chennai', 1, NULL, NULL),
(1057, 21, 'Coimbatore', 1, NULL, NULL),
(1058, 21, 'Cuddalore', 1, NULL, NULL),
(1059, 21, 'Dharmapuri', 1, NULL, NULL),
(1060, 21, 'Dindigul', 1, NULL, NULL),
(1061, 21, 'Erode', 1, NULL, NULL),
(1062, 21, 'Kanchipuram', 1, NULL, NULL),
(1063, 21, 'Kanyakumari', 1, NULL, NULL),
(1064, 21, 'Karur', 1, NULL, NULL),
(1065, 21, 'Madurai', 1, NULL, NULL),
(1066, 21, 'Nagapattinam', 1, NULL, NULL),
(1067, 21, 'The Nilgiris', 1, NULL, NULL),
(1068, 21, 'Namakkal', 1, NULL, NULL),
(1069, 21, 'Perambalur', 1, NULL, NULL),
(1070, 21, 'Pudukkottai', 1, NULL, NULL),
(1071, 21, 'Ramanathapuram', 1, NULL, NULL),
(1072, 21, 'Salem', 1, NULL, NULL),
(1073, 21, 'Sivagangai', 1, NULL, NULL),
(1074, 21, 'Tiruppur', 1, NULL, NULL),
(1075, 21, 'Tiruchirappalli', 1, NULL, NULL),
(1076, 21, 'Theni', 1, NULL, NULL),
(1077, 21, 'Tirunelveli', 1, NULL, NULL),
(1078, 21, 'Thanjavur', 1, NULL, NULL),
(1079, 21, 'Thoothukudi', 1, NULL, NULL),
(1080, 21, 'Thiruvallur', 1, NULL, NULL),
(1081, 21, 'Thiruvarur', 1, NULL, NULL),
(1082, 21, 'Tiruvannamalai', 1, NULL, NULL),
(1083, 21, 'Vellore', 1, NULL, NULL),
(1084, 21, 'Villupuram', 1, NULL, NULL),
(1085, 22, 'Dhalai', 1, NULL, NULL),
(1086, 22, 'North Tripura', 1, NULL, NULL),
(1087, 22, 'South Tripura', 1, NULL, NULL),
(1088, 22, 'West Tripura', 1, NULL, NULL),
(1089, 33, 'Almora', 1, NULL, NULL),
(1090, 33, 'Bageshwar', 1, NULL, NULL),
(1091, 33, 'Chamoli', 1, NULL, NULL),
(1092, 33, 'Champawat', 1, NULL, NULL),
(1093, 33, 'Dehradun', 1, NULL, NULL),
(1094, 33, 'Haridwar', 1, NULL, NULL),
(1095, 33, 'Nainital', 1, NULL, NULL),
(1096, 33, 'Pauri Garhwal', 1, NULL, NULL),
(1097, 33, 'Pithoragharh', 1, NULL, NULL),
(1098, 33, 'Rudraprayag', 1, NULL, NULL),
(1099, 33, 'Tehri Garhwal', 1, NULL, NULL),
(1100, 33, 'Udham Singh Nagar', 1, NULL, NULL),
(1101, 33, 'Uttarkashi', 1, NULL, NULL),
(1102, 23, 'Agra', 1, NULL, NULL),
(1103, 23, 'Allahabad', 1, NULL, NULL),
(1104, 23, 'Aligarh', 1, NULL, NULL),
(1105, 23, 'Ambedkar Nagar', 1, NULL, NULL),
(1106, 23, 'Auraiya', 1, NULL, NULL),
(1107, 23, 'Azamgarh', 1, NULL, NULL),
(1108, 23, 'Barabanki', 1, NULL, NULL),
(1109, 23, 'Badaun', 1, NULL, NULL),
(1110, 23, 'Bagpat', 1, NULL, NULL),
(1111, 23, 'Bahraich', 1, NULL, NULL),
(1112, 23, 'Bijnor', 1, NULL, NULL),
(1113, 23, 'Ballia', 1, NULL, NULL),
(1114, 23, 'Banda', 1, NULL, NULL),
(1115, 23, 'Balrampur', 1, NULL, NULL),
(1116, 23, 'Bareilly', 1, NULL, NULL),
(1117, 23, 'Basti', 1, NULL, NULL),
(1118, 23, 'Bulandshahr', 1, NULL, NULL),
(1119, 23, 'Chandauli', 1, NULL, NULL),
(1120, 23, 'Chitrakoot', 1, NULL, NULL),
(1121, 23, 'Deoria', 1, NULL, NULL),
(1122, 23, 'Etah', 1, NULL, NULL),
(1123, 23, 'Kanshiram Nagar', 1, NULL, NULL),
(1124, 23, 'Etawah', 1, NULL, NULL),
(1125, 23, 'Firozabad', 1, NULL, NULL),
(1126, 23, 'Farrukhabad', 1, NULL, NULL),
(1127, 23, 'Fatehpur', 1, NULL, NULL),
(1128, 23, 'Faizabad', 1, NULL, NULL),
(1129, 23, 'Gautam Buddha Nagar', 1, NULL, NULL),
(1130, 23, 'Gonda', 1, NULL, NULL),
(1131, 23, 'Ghazipur', 1, NULL, NULL),
(1132, 23, 'Gorkakhpur', 1, NULL, NULL),
(1133, 23, 'Ghaziabad', 1, NULL, NULL),
(1134, 23, 'Hamirpur', 1, NULL, NULL),
(1135, 23, 'Hardoi', 1, NULL, NULL),
(1136, 23, 'Mahamaya Nagar', 1, NULL, NULL),
(1137, 23, 'Jhansi', 1, NULL, NULL),
(1138, 23, 'Jalaun', 1, NULL, NULL),
(1139, 23, 'Jyotiba Phule Nagar', 1, NULL, NULL),
(1140, 23, 'Jaunpur District', 1, NULL, NULL),
(1141, 23, 'Kanpur Dehat', 1, NULL, NULL),
(1142, 23, 'Kannauj', 1, NULL, NULL),
(1143, 23, 'Kanpur Nagar', 1, NULL, NULL),
(1144, 23, 'Kaushambi', 1, NULL, NULL),
(1145, 23, 'Kushinagar', 1, NULL, NULL),
(1146, 23, 'Lalitpur', 1, NULL, NULL),
(1147, 23, 'Lakhimpur Kheri', 1, NULL, NULL),
(1148, 23, 'Lucknow', 1, NULL, NULL),
(1149, 23, 'Mau', 1, NULL, NULL),
(1150, 23, 'Meerut', 1, NULL, NULL),
(1151, 23, 'Maharajganj', 1, NULL, NULL),
(1152, 23, 'Mahoba', 1, NULL, NULL),
(1153, 23, 'Mirzapur', 1, NULL, NULL),
(1154, 23, 'Moradabad', 1, NULL, NULL),
(1155, 23, 'Mainpuri', 1, NULL, NULL),
(1156, 23, 'Mathura', 1, NULL, NULL),
(1157, 23, 'Muzaffarnagar', 1, NULL, NULL),
(1158, 23, 'Pilibhit', 1, NULL, NULL),
(1159, 23, 'Pratapgarh', 1, NULL, NULL),
(1160, 23, 'Rampur', 1, NULL, NULL),
(1161, 23, 'Rae Bareli', 1, NULL, NULL),
(1162, 23, 'Saharanpur', 1, NULL, NULL),
(1163, 23, 'Sitapur', 1, NULL, NULL),
(1164, 23, 'Shahjahanpur', 1, NULL, NULL),
(1165, 23, 'Sant Kabir Nagar', 1, NULL, NULL),
(1166, 23, 'Siddharthnagar', 1, NULL, NULL),
(1167, 23, 'Sonbhadra', 1, NULL, NULL),
(1168, 23, 'Sant Ravidas Nagar', 1, NULL, NULL),
(1169, 23, 'Sultanpur', 1, NULL, NULL),
(1170, 23, 'Shravasti', 1, NULL, NULL),
(1171, 23, 'Unnao', 1, NULL, NULL),
(1172, 23, 'Varanasi', 1, NULL, NULL),
(1173, 24, 'Birbhum', 1, NULL, NULL),
(1174, 24, 'Bankura', 1, NULL, NULL),
(1175, 24, 'Bardhaman', 1, NULL, NULL),
(1176, 24, 'Darjeeling', 1, NULL, NULL),
(1177, 24, 'Dakshin Dinajpur', 1, NULL, NULL),
(1178, 24, 'Hooghly', 1, NULL, NULL),
(1179, 24, 'Howrah', 1, NULL, NULL),
(1180, 24, 'Jalpaiguri', 1, NULL, NULL),
(1181, 24, 'Cooch Behar', 1, NULL, NULL),
(1182, 24, 'Kolkata', 1, NULL, NULL),
(1183, 24, 'Malda', 1, NULL, NULL),
(1184, 24, 'Midnapore', 1, NULL, NULL),
(1185, 24, 'Murshidabad', 1, NULL, NULL),
(1186, 24, 'Nadia', 1, NULL, NULL),
(1187, 24, 'North 24 Parganas', 1, NULL, NULL),
(1188, 24, 'South 24 Parganas', 1, NULL, NULL),
(1189, 24, 'Purulia', 1, NULL, NULL),
(1190, 24, 'Uttar Dinajpur', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Old Customers', 1, '2024-02-18 01:13:56', '2024-02-18 05:45:35'),
(6, 'Ship Customers', 0, '2024-02-18 05:45:11', '2024-02-18 05:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Reading', 1, '2024-02-15 12:09:53', '2024-02-15 12:09:53'),
(2, 'Gardening', 1, '2024-02-15 12:09:53', '2024-02-15 12:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 4),
(6, 'App\\Models\\User', 6),
(7, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0c62285313455722a5d71600b8fc57473973566116ace147a8343c324c06aa23b395f6428fad945a', 1, 3, 'MyApp', '[]', 0, '2024-02-17 10:40:42', '2024-02-17 10:40:43', '2025-02-17 16:10:42'),
('1d6fbc058c8a237d6208be1ac262d8c113c71b4b38a67fdca07c5ec4fedab51f473810f701b2a952', 1, 3, 'MyApp', '[]', 0, '2024-02-18 06:37:52', '2024-02-18 06:37:52', '2025-02-18 12:07:52'),
('6794dcf16323966d880c4dec6e996dd3375ad98e336376398ca13f6ad7ab6060dae61f476dc219ed', 7, 3, 'MyApp', '[]', 0, '2024-02-18 06:40:03', '2024-02-18 06:40:03', '2025-02-18 12:10:03'),
('c11f6d7bc71a11f3aa33df9bb3dda25da324522e0031e266713111851a1e0aa3c3dec2aba8ebdee5', 3, 3, 'MyApp', '[]', 0, '2024-02-18 06:18:29', '2024-02-18 06:18:31', '2025-02-18 11:48:29'),
('c6e4c430618e1e5fbf700eb1c9c72b3ef9c0acacb043108a1dcb75df1c1181da5e428a7e3bf270bc', 1, 3, 'MyApp', '[]', 0, '2024-02-17 10:30:57', '2024-02-17 10:30:59', '2025-02-17 16:00:57'),
('e02873cd2834a739cecaf3788534d88549587d6a58dacb06a96a2a8e3cb5646f90186b0cbf301964', 4, 3, 'MyApp', '[]', 0, '2024-02-17 06:23:13', '2024-02-17 06:23:14', '2025-02-17 11:53:13'),
('fca034671f3f775bdc1a536214fdceb672f92a392528cebc98e85541b4fae2125d0cccd83ac61980', 6, 3, 'MyApp', '[]', 0, '2024-02-18 06:37:27', '2024-02-18 06:37:28', '2025-02-18 12:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'm6qQ9RESs6mxAByS3BxO7pODFNQJocLrJxbUefoI', NULL, 'http://localhost', 1, 0, 0, '2024-02-15 12:49:41', '2024-02-15 12:49:41'),
(2, NULL, 'Laravel Password Grant Client', 'LjacEDP7lVw4wbWDua6HXczSlLW91D6BS48mDYL6', 'users', 'http://localhost', 0, 1, 0, '2024-02-15 12:49:41', '2024-02-15 12:49:41'),
(3, NULL, 'Laravel Personal Access Client', 'xmqrk5Ku3oMvGgMppHn3TEQauFY4d4F5OegkmY4q', NULL, 'http://localhost', 1, 0, 0, '2024-02-15 12:49:53', '2024-02-15 12:49:53'),
(4, NULL, 'Laravel Password Grant Client', 'aG4zjVFBERhsILArhSnEq4cEq3l6kymKj5zgXED5', 'users', 'http://localhost', 0, 1, 0, '2024-02-15 12:49:53', '2024-02-15 12:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-02-15 12:49:41', '2024-02-15 12:49:41'),
(2, 3, '2024-02-15 12:49:53', '2024-02-15 12:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard-menu', 'web', '2024-02-17 16:24:19', '2024-02-17 11:31:07'),
(2, 'roles-menu', 'web', '2024-02-17 16:24:19', '2024-02-17 16:24:19'),
(3, 'permissions-menu', 'web', '2024-02-17 16:24:19', '2024-02-17 16:24:19'),
(4, 'customers-menu', 'web', '2024-02-17 16:24:19', '2024-02-17 16:24:19'),
(9, 'suppliers-menu', 'web', '2024-02-17 23:35:12', '2024-02-17 23:35:12'),
(10, 'users-menu', 'web', '2024-02-17 23:56:00', '2024-02-17 23:56:12'),
(11, 'role-list', 'web', '2024-02-17 23:56:33', '2024-02-17 23:56:33'),
(12, 'role-create', 'web', '2024-02-17 23:56:43', '2024-02-17 23:56:43'),
(13, 'role-edit', 'web', '2024-02-17 23:56:50', '2024-02-17 23:56:50'),
(14, 'role-delete', 'web', '2024-02-17 23:57:00', '2024-02-17 23:57:00'),
(15, 'permission-list', 'web', '2024-02-17 23:58:11', '2024-02-17 23:58:11'),
(16, 'permission-create', 'web', '2024-02-17 23:58:26', '2024-02-17 23:58:26'),
(17, 'permission-edit', 'web', '2024-02-17 23:58:48', '2024-02-17 23:58:48'),
(18, 'permission-delete', 'web', '2024-02-17 23:58:57', '2024-02-17 23:58:57'),
(20, 'customer-list', 'web', '2024-02-18 01:23:21', '2024-02-18 01:23:21'),
(21, 'customer-create', 'web', '2024-02-18 01:23:27', '2024-02-18 01:23:27'),
(22, 'customer-edit', 'web', '2024-02-18 01:23:34', '2024-02-18 01:23:34'),
(23, 'customer-delete', 'web', '2024-02-18 01:23:40', '2024-02-18 01:23:40'),
(24, 'supplier-list', 'web', '2024-02-18 01:23:47', '2024-02-18 01:23:47'),
(25, 'supplier-create', 'web', '2024-02-18 01:23:52', '2024-02-18 01:23:52'),
(26, 'supplier-edit', 'web', '2024-02-18 01:23:59', '2024-02-18 01:23:59'),
(27, 'supplier-delete', 'web', '2024-02-18 01:24:06', '2024-02-18 01:24:06'),
(28, 'user-list', 'web', '2024-02-18 01:24:11', '2024-02-18 01:24:11'),
(29, 'user-create', 'web', '2024-02-18 01:24:16', '2024-02-18 01:24:16'),
(30, 'user-edit', 'web', '2024-02-18 01:24:21', '2024-02-18 01:24:21'),
(31, 'user-delete', 'web', '2024-02-18 01:24:26', '2024-02-18 01:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-02-01 16:14:19', '2024-02-01 16:14:38'),
(4, 'Super Admin', 'web', '2024-02-17 23:31:35', '2024-02-18 00:57:23'),
(6, 'Customer', 'web', NULL, NULL),
(7, 'Supplier', 'web', NULL, NULL),
(8, 'User', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(4, 6),
(9, 4),
(9, 7),
(10, 4),
(10, 8),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(20, 4),
(20, 6),
(21, 4),
(21, 6),
(22, 4),
(22, 6),
(23, 4),
(23, 6),
(24, 4),
(24, 7),
(25, 4),
(25, 7),
(26, 4),
(26, 7),
(27, 4),
(27, 7),
(28, 4),
(28, 8),
(29, 4),
(29, 8),
(30, 4),
(30, 8),
(31, 4),
(31, 8);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ANDHRA PRADESH', 1, NULL, NULL),
(2, 'ASSAM', 1, NULL, NULL),
(3, 'ARUNACHAL PRADESH', 1, NULL, NULL),
(4, 'BIHAR', 1, NULL, NULL),
(5, 'GUJRAT', 1, NULL, NULL),
(6, 'HARYANA', 1, NULL, NULL),
(7, 'HIMACHAL PRADESH', 1, NULL, NULL),
(8, 'JAMMU & KASHMIR', 1, NULL, NULL),
(9, 'KARNATAKA', 1, NULL, NULL),
(10, 'KERALA', 1, NULL, NULL),
(11, 'MADHYA PRADESH', 1, NULL, NULL),
(12, 'MAHARASHTRA', 1, NULL, NULL),
(13, 'MANIPUR', 1, NULL, NULL),
(14, 'MEGHALAYA', 1, NULL, NULL),
(15, 'MIZORAM', 1, NULL, NULL),
(16, 'NAGALAND', 1, NULL, NULL),
(17, 'ORISSA', 1, NULL, NULL),
(18, 'PUNJAB', 1, NULL, NULL),
(19, 'RAJASTHAN', 1, NULL, NULL),
(20, 'SIKKIM', 1, NULL, NULL),
(21, 'TAMIL NADU', 1, NULL, NULL),
(22, 'TRIPURA', 1, NULL, NULL),
(23, 'UTTAR PRADESH', 1, NULL, NULL),
(24, 'WEST BENGAL', 1, NULL, NULL),
(25, 'DELHI', 1, NULL, NULL),
(26, 'GOA', 1, NULL, NULL),
(27, 'PONDICHERY', 1, NULL, NULL),
(28, 'LAKSHDWEEP', 1, NULL, NULL),
(29, 'DAMAN & DIU', 1, NULL, NULL),
(30, 'DADRA & NAGAR', 1, NULL, NULL),
(31, 'CHANDIGARH', 1, NULL, NULL),
(32, 'ANDAMAN & NICOBAR', 1, NULL, NULL),
(33, 'UTTARANCHAL', 1, NULL, NULL),
(34, 'JHARKHAND', 1, NULL, NULL),
(35, 'CHATTISGARH', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Suppliers', 1, '2024-02-18 05:42:35', '2024-02-18 05:42:35'),
(2, 'New Suppliers', 0, '2024-02-18 05:44:01', '2024-02-18 05:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `mobile` bigint(20) UNSIGNED DEFAULT NULL,
  `postal_code` int(10) UNSIGNED DEFAULT NULL,
  `hobby_ids` varchar(200) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `first_name`, `last_name`, `mobile`, `postal_code`, `hobby_ids`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', NULL, '$2y$12$4hew90q7k//gDYw7oEPeYOmT8kb32UsypZf3WMBWCVYohROk09IVu', 'NlhYf23yXsUD3VtCNVeo9csVLDbwifrhgrJKeUEeqGeFdPXlKpDG6QrlJJPB', 'admin', 'admin', 9879879870, 395001, '1,2', 1, NULL, '2024-02-15 12:49:11', '2024-02-15 12:49:11'),
(3, 'pehyv@mailinator.com', NULL, '$2y$12$eE8.5qxft5hqQaL2jGSmF.gdQb4onbL5dAWJ/D2oZYkdPa0VRvskm', 'ztUbUR61TQhsGfdXArdebfoJBRfgeDGWmMuMTmryv7Q3MMVYe1QXBaFY1Fh4', 'Aidan', 'Mcgowan', 1461325868, 395001, '1,2', 1, 1, '2024-02-17 05:54:25', '2024-02-17 05:54:25'),
(6, 'johndoe@gmail.com', NULL, '$2y$12$CoUTkA61NloqkKDvb1KLq.wybwKTESJRwwDFK7qDGkXZWznZ.osbG', 'N6DYDtbim055IyeiG71SGGcPjlyUn71l5JCBIfrHbuDJnReC1BvDkFFn1xO6', 'John Customer', 'Doe 007', 9879879870, 395001, '1,2', 1, NULL, '2024-02-18 06:37:26', '2024-02-18 06:37:26'),
(7, 'loreum@gmail.com', NULL, '$2y$12$qtcROMfQZ/H1s4XkTwvaEeLb/C3LJFHVo7UJAm8wO58lwAcLng/.C', 'Ioa74zWhM5DSVG9U3bd9Bl1eZAV2cj1tuHNaBi2Z1drOhUMnGthTGb8ICuQy', 'loreum', 'ispum', 1231231230, 395001, '1,2', 1, NULL, '2024-02-18 06:40:01', '2024-02-18 06:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE `user_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, '65d0976967f98_profile_pic_1708169065.png', 1, '2024-02-17 05:54:25', '2024-02-17 05:54:25'),
(4, 3, '65d097697000a_profile_pic_1708169065.png', 1, '2024-02-17 05:54:25', '2024-02-17 05:54:25'),
(8, 6, '65d1f2fe52390_profile_pic_1708258046.png', 1, '2024-02-18 06:37:26', '2024-02-18 06:37:26'),
(9, 7, '65d1f399a777d_profile_pic_1708258201.png', 1, '2024-02-18 06:40:01', '2024-02-18 06:40:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_files`
--
ALTER TABLE `user_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_files_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1207;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_files`
--
ALTER TABLE `user_files`
  ADD CONSTRAINT `user_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
