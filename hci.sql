-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 04:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hci`
--

-- --------------------------------------------------------

--
-- Table structure for table `hc_banner`
--

CREATE TABLE `hc_banner` (
  `banner_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_desc` text NOT NULL,
  `banner_pic` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `banner_link` text NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_banner`
--

INSERT INTO `hc_banner` (`banner_id`, `page_id`, `banner_title`, `banner_desc`, `banner_pic`, `status`, `banner_link`, `sort_order`) VALUES
(1, 1, '', '<h5>WELCOME TO <span>THE HEALTHY CLIMATE INITIATIVE</span></h5>', 'uploads/1610101493banner1.jpg', 'Y', '', 0),
(2, 1, '', '<h5>WELCOME TO <span>THE HEALTHY CLIMATE INITIATIVE</span></h5>', 'uploads/1610101501banner2.jpg', 'Y', '', 0),
(3, 1, '', '<h5>WELCOME TO <span>THE HEALTHY CLIMATE INITIATIVE</span></h5>', 'uploads/1610101507banner3.jpg', 'Y', '', 0),
(5, 2, '', '', 'uploads/1610441444climate-change-pic.jpeg', 'Y', '', 0),
(6, 3, '', '', 'uploads/1610441499banner-climatechange1.jpg', 'Y', '', 0),
(7, 4, '', '', 'uploads/1610441528banner-solutions.jpg', 'Y', '', 0),
(8, 5, '', '', 'uploads/1610441543banner-leadership.jpg', 'Y', '', 0),
(9, 6, '', '', 'uploads/1610441559banner-resources.jpg', 'Y', '', 0),
(10, 7, '', '', 'uploads/1610441571banner-blog.jpg', 'Y', '', 0),
(11, 8, '', '', 'uploads/1610441584banner-news.jpg', 'Y', '', 0),
(12, 9, '', '', 'uploads/1611414929banner-events.jpg', 'Y', '', 0),
(13, 11, '', '', 'uploads/1610701342banner-events.jpg', 'Y', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hc_blog`
--

CREATE TABLE `hc_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_short_desc` text NOT NULL,
  `blog_long_desc` text NOT NULL,
  `blog_pic` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_date` varchar(255) NOT NULL,
  `popular` enum('Y','N') NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_blog`
--

INSERT INTO `hc_blog` (`blog_id`, `blog_short_desc`, `blog_long_desc`, `blog_pic`, `blog_image`, `blog_date`, `popular`, `status`) VALUES
(2, '<p>\"An important exchange of viewpoints between Mr Narendra Murty and Dwijadas Ghosal\"</p>', '<h2>Narendra Murty</h2>\r\n\r\n<p>This is Narendra Murty. I am writing to you to explain why I have been silent on this platform for a long time. Dwijo included me in this group knowing my seriousness and concern about climate change. I am very passionate about the subject. To the extent that I devoted four years of my life studying and researching to write a book on the subject. The book is titled Nothing Fails Like Success and is available online as a Kindle eBook. If any of you are interested I can send you the link. However, I am not writing to you to sell my book. That is why I am not providing the link right now.</p>\r\n\r\n<p>For me, climate change is a symptom of a disease that our civilization is suffering from and that disease is called THE CRISIS OF VALUES. Not environmental, social or economic crisis, but a crisis of our thinking itself. For we have deceived ourselves into believing that mere economic prosperity would solve all our problems. The sick economic system that devised a fourteen hour work day is normal for us because we don’t see ourselves as exploited individuals but as <em>“temporarily embarrassed millionaires”,</em> to use Steinbeck’s phrase.</p>\r\n\r\n<p>The environment is dying but we are sure that technology would save us. We even have a bunch of scientists in the pay roll of fossil fuel giants who sing the tune that global warming is a hoax. They churn out data to argue that there is nothing unusual about the unusually hot summers we are facing and about the oceanic storms that get more and more catastrophic with each passing day. Why do they do that? Because they cannot admit that economic activities and endless economic growth is leading to ecological catastrophe. We all talk about tackling global warming, pollution, the menace of plastics but we cannot see the simple fact that the planet cannot take anymore economic growth. We have breached all the tolerance margins of Nature and now we are going deeper and deeper into the danger zone. And none of our economic growth models provide for this scenario.</p>\r\n\r\n<p>Friends, our faulty and toxic Economics is the key and that is where the battle field lies. All our profit maximising economic models which do not contain environmental and social impact of economic activities is what is creating this problem of global warming and environmental degradation. This is the disease. Climate change, pollution, deforestation, methane emission, thawing of the permafrost, mass extinctions, the plastic menace – all these are merely symptoms. The disease is our profit maximisation models of economic growth without any regard to environmental impact. You people talk about reducing carbon emissions. How are you going to do it? By giving moral lessons to the companies? The battle field lies in the academia, in the business schools, in the colleges where they teach economics. We have to confront them and tell them plainly that they are teaching an outdated, toxic version of economics which is a threat to the existence of the planet. We have to confront the professors, policy makers, bureaucrats and those gentlemen in pin-stripe suits who would be converging for the World Economic Forum at Davos this winter for another round of empty entertainment and an equally feigned concern for the future of the planet.</p>\r\n\r\n<p>In this battle we have foot soldiers in plenty. The activists who would actually get down to the streets to protest with flags and banners. The likes of Greta. We have plenty of those. What we don’t have are the ideological warriors. Who would carry out the battle of ideas with the academicians, economists and professors of the business schools who are teaching a toxic brand of economics to the policy makers and who are the apologists for the corporate leaders who want profit maximisation at the cost of the planet. But this kind of battle involves risks. We may be attacked, victimised and made to pay for speaking up. Because everybody is silent on this. Even the media. I am interested in this kind of an intellectual confrontation with the economic establishment – in the academia, in the business schools, in the media and even in cyber space. Let us ask the economists to show their economic growth models. Do they contain environmental and social costs built into them? They don’t? Only profit maximisation? Let’s tell them on their face that they are teaching shit! Let’s appeal to the students not to enrol for this kind of fraudulent economics courses.</p>\r\n\r\n<p>Trying to reduce pollution, plastics, adopting a green life style – all these of course have their place and importance. But according to me they are Band-Aid cures. The disease is not being addressed. The disease is profit maximising economic models. Unless we attack them at every forum, we are finished. No amount of activism on the streets and cleaning the plastics is going to save the planet. Because the global warming and damage to the environment would continue unabated.</p>\r\n\r\n<p>Friends, it’s an ideological battle. But if you want to carry on with your discussion and plan of action about influencing policy makers as to how to reduce carbon emissions, how to remove plastics, how to deal with arsenic contamination etc. you are welcome to do that. It could be a feel good factor and give us a high but I don’t have the time for such activities. Because the causes remaining untouched, nothing is going to change. I still wish you the very best and I know that your intentions are true and honest. But I won’t be able to devote time to this. I am sorry. Please forgive me.</p>\r\n\r\n<h2>Dwijadas Ghosal</h2>\r\n\r\n<p>You must have gone through the write up of Mr Narendra Murthy. I am sure you all will appreciate his deep understanding about the environmental issues and his analysis regarding the root cause of the problem.</p>\r\n\r\n<p>As he is a very good friend of mine, we discussed and debated many issues of climate change and environmental degradation so many times albeit on different context.</p>\r\n\r\n<p>Although I respect and value his viewpoints, still we agree to disagree on many issues as always. This time also I feel I should discuss his observations and put the context in right perspective with no holds bar, as far as our objectives are concerned. Being my friend, I am sure he will not mind that.</p>\r\n\r\n<p>The following are the key points of his write up</p>\r\n\r\n<p>Climate change is a symptom of a disease and that disease is called the Crisis of Values.</p>\r\n\r\n<p>Profit maximizing economics is creating this problem of global warming and environmental degradation.</p>\r\n\r\n<p>Foot soldiers who are in plenty like us are not ideological warriors, rather harping on some activities which can give feel good factors</p>\r\n\r\n<p>Since causes remaining untouched, nothing is going to change and global warming and damage to the environment would continue unabated.</p>\r\n\r\n<p>I agree to his statement regarding crisis of values…but there is an important distinction between values that is personal and psychological, and values that is institutional and organized. It is well established that fossil fuel companies have long known about climate change, yet sought to frustrate wider public understanding on account of business interest. Individually they are glimpsing the horrible reality, but defending themselves against it institutionally for obvious reasons.</p>\r\n\r\n<p>I disagree to his view point regarding profit maximization as the root cause of environmental degradation. To my view, this is not addressing the truth and considering profit maximization as a root cause for environmental degradation is the trivialization and over simplification of the problem. If you study the history of humanity, propensity towards profit maximization was always there. During industrial revolution, impetus towards profit maximization was even more prominent. You know that business used to be done with enormous risks even at the cost of human lives, mass scale murder, slave trading and what not. Situation is very much humane at present times. Let us not forget , it is the business which integrated entire Europe even after two world wars. Let’s not undermine the very psychology of expanding human possibility , which is very much ingrained in nature of existence as it supports our survival instinct. In lower plane , it finds expression in so called Profit Maximization. This is not a moral issue but reality of existence that drives majority of human population. The conventional theory of economics may assume profit maximization as the sole objective of organizations. But profit is indispensible for organization’s survival and may be justified reward for their saving ,risk-undertaking and innovation. As opposed to Narendra’s observation, in the real world other objectives are also fulfilled by many organizations like sales maximization, growth rate maximization, retention of market share or Image in terms of sustainability and social responsibilities. Exploitative perspective of profit as surplus as per Marx who believed that the market will transform values into prices beyond labor-determined values of goods, is not necessarily always tenable because of Ricardian reasons like population growth, resource crunch, and the Stationary State of economics.</p>\r\n\r\n<p>Can we really curb human aspiration by moralistic diktat against profit maximization ? Possibly No and that will be against the human drive towards higher order of civilization, barring few segments of population who will be spiritually driven to offer service beyond survival instinct.</p>\r\n\r\n<p>Then what is the root cause ? Ever since I started studying Environmental problems , I clearly understood one fact that the burgeoning population figures is the root cause of environmental degradation. All other causes are the consequence of the same. I rather emphasize uneducated population because behaviour of the uneducated populace towards the environment resulted in havoc in the environment. It is proved beyond doubt especially in India that Land degeneration and Population growth is directly linked. It is the increasing population figures combined with poverty that is creating more damage to the environment.</p>\r\n\r\n<p>Let me justify the statement with evidence. As for water shortages, Indonesia with one of the world’s highest freshwater endowments per person faces worst water shortage. India and Pakistan is facing severe water shortages amidst population growth and water subsidies for vote bank politics. All these phenomena has got nothing to do with Profit Maximization or stuff like that. With billions of people living below the poverty line and considering that their first priority is to survive, environmental protection does not mean much to them. Like population growth, poverty seems to exacerbate environmental problems in the presence of market and policy failures. Rather once a country becomes economically prosperous, \"environmental Kuznets curve\" is applicable for the country. As a result, it enforce environmental regulations more strictly and spend more money on the environment. Once effective policy decisions are made to ensure that economic growth is harmonised with the surrounding environment, environmental degradation levels off and gradually declines. Most parts of the Europe , Newzealand etc are testimony to my statement.</p>\r\n\r\n<p>Now let us try to understand the meaning of Ideological Warriors and so called Foot soldiers.</p>\r\n\r\n<p>What is an ideology? It&#39;s a set of value-laden beliefs or possibly moral values and standard. For example, moral systems are ideologies. Since the ideological warrior is committed to values which they cannot justify through reason, logic or fact, this makes them morally compromised. History shows that so called Ideological Warriors as moralist moron committed horrendous atrocity in the planet. Reasons are simple….the ideological warrior will never be convinced by the avalanche of facts and arguments you bring to bear against them on the subject matter in question unless you defeat their ideology with cold logic. Especially when so called Ideological Warriors have God given purpose, then we are gone. Not even logic will prevail on them. That is the reason as to why you will find religious people are frequently ideological warriors, their faith constantly renewing their ignorance of disproofs of religious arguments. Do environmental activists need to ideological warrior? Definitely No. Better still , if they remain on the stand instead of being on court like Foot Soldiers. Because so called Foot Soldiers are the opposite of an ideological warrior who consciously reflects on their values, explicitly justifies and reasons about their values, and in general maintains end to end consistency.</p>\r\n\r\n<p>Let’s analyse whether so called Foot Soldiers as Environmental activist are merely harping on feel good factors or contributed significantly to save this planet.</p>\r\n\r\n<p>You will be surprised to know that the modern conservation movement was first manifested in the forests of India during pre-independence India with the participation of some British people. Unless that movement took place, most of the forest would have gone before independence itself.</p>\r\n\r\n<p>We all are aware of mid-1970s anti-nuclear activism that saved the planet from Nuclear proliferation by virtue of SALT.</p>\r\n\r\n<p>We all should appreciate that Safe Drinking Water Act, First Emissions and Efficiency Rules for Vehicles,Phasing Out Toxic PCBs, Protection act for Endangered Species, banning of DDT Pesticide ,regulation of GE crop, CFCs in Aerosol Sprays, Return of Mass Transit ,banning of single use plastic in India,Conservation and Utilization of Resources,Land and Water Conservation Act, Clean Air Act, G7 agreeing to phase out fossil fuels by 2100 and so on so forth did not happen automatically , all these happened because of Environmental activists as Foot Soldiers. We all should appreciate spontaneous environmental movements in South Korea and Taiwan regarding biologically dead rivers on account of industrial pollutants. The people were able to force the government to come out with new restrictive rules on toxins, industrial waste, and air pollution. Ongoing struggle within India in respect of Environmental and public health resulted in Chipko movement, campaign against Coca-Cola and Pepsi Cola plants , Jhola Aandolan , Eco Revolution movement, Rally for River and Kavery Calling initiatives and of course the anti-dam movement. Not that it happened because some ideological warrior wrote some thesis and Government was willing listen to that. Game happens on the court, not on the stand.</p>\r\n\r\n<p>When I argued with Rajkapoor Sharma ( he is in the group) that Dam should not be built as 60% of stored water gets evaporated, he talked about brilliant solution on putting solar panel over dam. There are so many technological fix like direct air capture for carbon sequestration, as it is being done in Switzerland, Wind Mill/Turbine for which Denmark is famous, Fuel Cell Battery Technology etc. etc. We all need to assess what sort of technological fix we should adopt for the solution functionalities considering realities of the situation.</p>\r\n\r\n<p>I see a point in Narendra’s recommendation in terms of creation of New Economic Metrics that does not fetishize growth assuming that a bigger economy is not necessarily a better one. Like Gross National Happiness Index in Bhutan is much better that economic superpowers. Only difference is that I am more propelled by network thinking with science –oriented core and Scientific Monism compared to his unflinching reliance on Schumacher’s “Small is beautiful”.</p>\r\n\r\n<p>But I must admit that all of successes of foot soldiers are limited in scope. None will magically transform our society into a sustainable utopia. The world still faces a host of complex problems, from our ever-expanding population, which places manifold stresses on the natural environment, to the stubborn growth of GHG emissions in our atmosphere.Yet however small and insufficient these achievements have been, the sustainability movement has had successes—successes that can serve as inspiration and a basis for meeting bigger goals.</p>', 'uploads/1610279827blog-pic1.jpg', 'uploads/1610279827blog-pic1.jpg', '1610434502', 'N', 'Y'),
(3, '<p>\"Excerpts from D. Ghosal’s speech at Sundargram Meet up on 12.01.2020\"</p>', '<h2>Topic</h2>\r\n\r\n<p xss=removed>Which is the most important environmental issue for India ... Land degradation or GHG emission?</p>\r\n\r\n<h2>Problem</h2>\r\n\r\n<p xss=removed>This is not to gainsay effects of GHG emission....but land degradation is immediate priority because people will die out of hunger in coming years.. About 32% of India’s land area or 105 million hectares is undergoing land degradation. Because trees are cut without considering the consequences, the fertile, nutritious topsoil is washed away in rainfall water runoff. This is a great loss to Indian farmers who often depend on the natural fertility of the soil to grow their crops. Already more than 3 lacs farmers have committed suicide since 1995 as per the reports of The National Crime Records Bureau of India. This figure is astronomically higher than any other casualty we have witnessed even in India Pakistan wars, terrorism and violence. Why nobody is talking about it? Because no media is interested in that and we are kept in the darkness in a systematic way. You will be hearing that farmers are committing suicide because of debt etc. Please understand that this is a real environmental issue. Farmers are committing suicide because land is becoming distressed.</p>\r\n\r\n<h2>Reasons</h2>\r\n\r\n<p xss=removed>When trees are taken off, floods often increase because most of the water enters streams and rivers in a very short timeframe. Such high intensity flow is often not usable by human beings and usually flows into the ocean, while also causing soil erosion which leads to loss in soil nutrients. This is why large areas of formerly productive land, where annual rainfall is relatively high, have become desertified once tree cover is removed. The next loss is due to the groundwater situation. India’s groundwater situation is growing dire 60% of all India’s aquifers will be in a critical condition. More and more trees are being removed because of industrialization and population pressure. But for the trees, monsoon water instead of getting absorbed in the soil and recharging groundwater through the roots of the trees , are doing the reverse..... Taking away topsoil and making the land distressed.</p>\r\n\r\n<h2>Solutions</h2>\r\n\r\n<p xss=removed>India’s rivers are dependent on rainfall. Rainfall enters rivers and streams through two main mechanisms. One mechanism is surface flow over land. The second mechanism is through underground flow. Rain seeps into soil and becomes groundwater, which then gradually flows underground and enters streams, rivers etc.</p>\r\n\r\n<p xss=removed>Trees help rain seep into soil because living and decaying roots make soil porous by creating a network of well-connected, minuscule channels in the soil. Rainwater seeps into soil with such channels several hundred times faster than it seeps through soil without channels. Trees along riversides also provide habitat for flora and fauna and increase biodiversity. They act as wildlife corridors between fragmented habitats, keep river water cool and improve habitat conditions for aquatic animals. When branches or tree stumps fall into the water, this also creates new habitats and provides new energy sources for organisms.</p>\r\n\r\n<p xss=removed>Additionally, when plant debris falls on the soil and starts to organically degrade, it helps soil maintain integrity and form small aggregated clumps. These clumps also ensure that soil is porous.</p>\r\n\r\n<p xss=removed>Acute water shortage which will be the the reality in many parts of the India can only be addressed by creating vegetation. Rivers can survive only and only if there are vegetations on either sides of river.</p>\r\n\r\n<p xss=removed>There is a phenomenon in the nature whose explanation is still not clearly understood by scientists so far. There is a constant communication between cloud and the trees. The monsoon get distributed and spread across longer time depending upon the vegetation available. One theory suggests a corridor of trees along rivers can transport rain to the interior of continents. This indicates that forest cover plays a major role in the atmospheric circulation and water cycling on land. This suggests a good potential for forest-mediated solutions of the global desertification and water security problems. Trees also release tiny organic particles called aerosols that allow water vapour in the air to condense, bringing rainfall to areas that need them. Else monsoon will create flash floods, which is the reality right now.. leading to soil erosion.</p>\r\n\r\n<p xss=removed>Hence as far as India is concerned, the top priority for our environment is to create the agroforestry and address plastic pollution.</p>\r\n\r\n<h2>Actions required</h2>\r\n\r\n<p xss=removed>I think it is the high time for us to understand the real environmental problems in India. Most of the time we talked about global warming in respect of GHG emission , it is not significant. But what is the real environmental issue in India?</p>\r\n\r\n<p xss=removed>Carbon Sequestration with significant scalability is much more technical matter and beyond the ambit of most people..... rather common people in India can do tree plantation and support Agro forestry to address this impending calamity. let&#39;s look at practical and commonsensical aspects as to what kind of actions we can take that will approximate the ideals of green living in our individual life and the life of the larger community, of which we are members.</p>\r\n\r\n<p xss=removed>Even If we plant few trees and do something to inhibit plastic pollution, we will be addressing real environmental issue In India. In case of private land, agroforestry will be promoted among farmers. The forest department will provide support through subsidies, where our role comes into picture.</p>\r\n\r\n<p xss=removed>If we go for agro forestry, CO2 can be sequestered in a much greener way.... that&#39;s the key point....hence land degradation is the biggest environmental issue for India, there is no doubt about that.</p>\r\n\r\n<h2>Key Note</h2>\r\n\r\n<p xss=removed>Unless we address this issue, food riot will be inevitable as there would not be enough resources to produce food.</p>\r\n\r\n<p xss=removed>When are you going to wake up to this reality?</p>', 'uploads/1610279893blog-pic2.jpg', 'uploads/1610279893blog-pic2.jpg', '1610279893', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_ci_sessions`
--

CREATE TABLE `hc_ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_ci_sessions`
--

INSERT INTO `hc_ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('mlbvgklt6to9gmmci62b6as3mn3q6eqg', '::1', 1611845996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631313834353438303b6572726f727c733a34303a22556e617574686f72697a6564206163636573732120506c65617365206c6f67696e2066697273742e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d6c6f6765645f757365727c613a373a7b733a383a226c6f67696e5f6964223b733a313a2231223b733a31303a226c6f67696e5f74797065223b733a353a2261646d696e223b733a383a22757365726e616d65223b733a31303a22737570657261646d696e223b733a383a226c6f675f64617465223b733a31303a2231363131373732323030223b733a363a226c6f675f6970223b733a333a223a3a31223b733a31323a226c6f67696e5f737461747573223b623a313b733a373a226d656e755f6964223b693a313b7d);

-- --------------------------------------------------------

--
-- Table structure for table `hc_climate`
--

CREATE TABLE `hc_climate` (
  `climate_id` int(11) NOT NULL,
  `climate_title` varchar(255) NOT NULL,
  `climate_name` varchar(255) NOT NULL,
  `climate_desc` text NOT NULL,
  `climate_link` text NOT NULL,
  `climate_pic` varchar(255) NOT NULL,
  `climate_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_climate`
--

INSERT INTO `hc_climate` (`climate_id`, `climate_title`, `climate_name`, `climate_desc`, `climate_link`, `climate_pic`, `climate_date`) VALUES
(1, 'CLIMATE CHANGE AND HCI', 'Climate Change and Healthy Climate Initiative', '<p><span xss=removed>Life on earth is at stake due to the presence of excess greenhouse gases, primarily carbon dioxide (C02) in the atmosphere. The amount of C02 reached 415 parts per million (ppm), that is, about 40% more C02 (or, 1 trillion tons of excess C02) added in the last 100 years - the last time C02 reached this level was 3 million years ago. We are already seeing the effects: frequent destructive hurricanes, melting of glaciers/arctic, droughts and heatwaves, rising sea levels, frequent coastal flooding, destruction of marine ecosystems, etc. If the increase in CO2 continues, 150 million people could be underwater due to sea-level rise by 2050. Asia would be the worst affected-particularly countries like China, Bangladesh, India, Vietnam, Indonesia, and Thailand. Large parts of Shanghai, Kolkata, Mumbai, Dhaka, Chittagong, Jakarta, and Hanoi could be wiped out from the globe. Without intervention, Climate Change has the potential to destroy our civilization! The mission of Healthy Climate Initiative is to restore climate, i.e., remove the excess carbon dioxide from the atmosphere and make the climate safe and healthy for future generations.</span></p>', '<ul>\r\n <li><a href=\"https://www.nature.com/articles/s41467-019-12808-z\" target=\"_blank\">https://www.nature.com/articles/s41467-019-12808-z</a></li>\r\n <li><a href=\"https://climate.nasa.gov/evidence/\" target=\"_blank\">https://climate.nasa.gov/evidence/</a></li>\r\n <li><a href=\"https://www.nytimes.com/interactive/2019/10/29/climate/coastal-cities-underwater.html\" target=\"_blank\">https://www.nytimes.com/interactive/2019/10/29/climate/coastal-cities-underwater.html</a></li>\r\n <li><a href=\"https://www.climatecentral.org/pdfs/2019CoastalDEMReport.pdf\" target=\"_blank\">https://climatecentral.org/pdfs/2019CoastalDEMReport.pdf</a></li>\r\n</ul>', 'uploads/climate-change-pic.jpeg', '1610193376'),
(2, 'CLIMATE CHANGE CAUSES', 'Causes for Climate Change', '<p xss=removed>When the sunlight enters the earth, some of it is reflected to outer space, and the rest is absorbed, which eventually reflects as heat radiation. The atmospheric carbon dioxide (CO2) absorbs the heat and radiates it back to the earth&#39;s surface warming up the planet, that is, the CO2 acts like a blanket over the earth, which stays in the atmosphere over a thousand years. Thus, more CO2 would make the blanket thicker and the planet warmer. The concentration of CO2 in the atmosphere has been around 300 ppm (parts per million) or lower before the industrial revolution. The level of atmospheric CO2 is much higher today due to unchecked carbon pollution from fossil fuels during the industrial period.</p>\r\n\r\n<p xss=removed>This excess CO2 is trapping more heat, making global temperature to rise, and causing climate to change. Today, the amount of C02 is 415 ppm - the last time C02 reached this level was 3 million years ago when the temperature was 2°–3°C higher than during the time before industrialization, and the sea level was 50 - 80 feet higher than today.</p>', '<ul>\r\n <li><a href=\"https://www.climate.gov/news-features/understanding-climate/climate-change-atmospheric-carbon-dioxide\" xss=removed target=\"_blank\"> https://www.climate.gov/news-features/understanding-climate/climate-change-atmospheric-carbon-dioxide</a></li>\r\n <li><a href=\"https://climate.nasa.gov/climate_resources/24/graphic-the-relentless-rise-of-carbon-dioxide/\" xss=removed target=\"_blank\"> https://climate.nasa.gov/climate_resources/24/graphic-the-relentless-rise-of-carbon-dioxide/</a></li>\r\n <li><a href=\"https://www.youtube.com/watch?v=G4H1N_yXBiA\" xss=removed target=\"_blank\"> https://www.youtube.com/watch?v=G4H1N_yXBiA</a></li>\r\n <li><a href=\"https://www.youtube.com/watch?v=0F3QPY83NZQ\" xss=removed target=\"_blank\"> https://www.youtube.com/watch?v=0F3QPY83NZQ</a></li>\r\n</ul>', 'uploads/climate-change-cause-pic.jpg', '1610193492');

-- --------------------------------------------------------

--
-- Table structure for table `hc_cms`
--

CREATE TABLE `hc_cms` (
  `cms_id` int(10) NOT NULL,
  `cms_title` varchar(255) NOT NULL,
  `cms_desc` longtext NOT NULL,
  `cms_pic` varchar(255) NOT NULL,
  `cms_date` varchar(255) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_cms`
--

INSERT INTO `hc_cms` (`cms_id`, `cms_title`, `cms_desc`, `cms_pic`, `cms_date`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Home- WELCOME TO THE HEALTHY CLIMATE INITIATIVE', '<p>Healthy Climate Initiative is an Independent, Non-profit Online Community aimed at sharing information and discussing practical solutions that can be offered by each individual for adopting an environmentally friendly lifestyle. It focuses on the Climate Change and Sustainable Environment, especially in India, although it has an interest in Environment and Sustainability issues around the world.</p>', 'uploads/welcome-pic.png', '1610101199', '', '', ''),
(2, 'THE COMMUNITY IS FOCUSSING(1)', '<p>Awareness campaign within common people especially students’ communities.</p>', '', '1610103183', '', '', ''),
(3, 'The Community Is Focussing(2)', '<p>Disseminating a wide range of themes and issues related to Environment and Climate Change for a larger audience through the Internet. </p>', '', '1610103233', '', '', ''),
(4, 'The Community Is Focussing(3)', '<p>Interfacing with Government agencies for Policy level decisions.</p>', '', '1610103255', '', '', ''),
(8, 'Home-Solutions', '<p><span xss=removed>The survival of humanity is threatened due to the excess CO2 which humans have been emitting into the atmosphere over 200 hundred years. While the mainstream strategy to reduce the CO2 emission is important, this mitigation is inadequate to save the planet in the long run. The HCI is focussed on solutions based on negative emissions, that is, to reduce the atmospheric CO2 concentration to the level it was during the pre-industrial period, which is around 300 ppm. Some solutions can lower CO2 from the atmosphere with varying degrees of effectiveness.</span></p>', '', '1610106174', '', '', ''),
(5, 'The Community Is Focussing(4)', '<p>To envision projects with  solution functionalities related to Environment and Climate Change and propose those to concerned agencies for implementation.</p>', '', '1610103274', '', '', ''),
(6, 'The Community Is Focussing(5)', '<p>To provide  guidance / consultancy,  harnessing individual talent and expertise in the community by virtue of collective wisdom</p>', '', '1610103291', '', '', ''),
(7, 'Home-Genesis', '<p><span xss=removed>Healthy Climate Initiative was launched in July 2019. Participants of the community are working professionals spread all over the world. The motivation behind creating this community originated from waking up to the reality of Climate Change, and the next Generation is going to face the catastrophic consequences out of the inevitable. The key tenet of this community is to respond to challenges of Climate Change and firm up collective knowledge and solutions that humanity can use for Sustainable living.</span></p>', '', '1610102675', '', '', ''),
(9, 'Header', '<span>The Healthy Climate Initiative (HCI) is a nonprofit education and advocacy group to combat global warming and climate change with a focus in India.</span>', '', '1610437731', '', '', ''),
(10, 'Past event-Image', '', 'uploads/pic.jpg', '1611240488', '', '', ''),
(11, 'upcoming event-image', '', 'uploads/pic1.jpg', '1611241246', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hc_comment`
--

CREATE TABLE `hc_comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `comm` text NOT NULL,
  `home` enum('Y','N') NOT NULL,
  `create_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hc_event`
--

CREATE TABLE `hc_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `event_host` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_content` text NOT NULL,
  `event_pic` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_video_link` varchar(255) NOT NULL,
  `event_information_link` text NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_event`
--

INSERT INTO `hc_event` (`event_id`, `event_name`, `event_date`, `event_time`, `event_host`, `event_venue`, `event_content`, `event_pic`, `event_image`, `event_video_link`, `event_information_link`, `status`) VALUES
(2, 'PLANTATION AT JHARKHALI, SUNDARBAN', '', '', '', '', '<div class=\"upcoming-text\" xss=removed>\r\n<h4>BACKDROP</h4>\r\n\r\n<p xss=removed>Team comprising of Shri Ashok Chatterjee, Shri Chandan Bhattacharyya, Shri D Ghosal and Smt Urmi Ghosal visited number of times before the onset of the Project. Finally team had a meeting with Local People, Local authorities and Forest Department. Details of report regarding plan of actions arrived during the visits featured in earlier report on Sundaban visit.</p>\r\n\r\n<p xss=removed>Modus operandi of Healthy Climate Initiative conforms to its network thinking in respect of cluster concept, multi layer plantation of different varieties of plants in sequence covering Mangrove, Miyawaki process for high growth plant and Fruit bearing trees for blending ecology and economy for sustainable process in line with Cauvery Calling concept for income generation in future. HCI believes putting more efforts and resources on protecting plants than the cost of the plants and carry out these out of their own investment. It was observed that many organizations did plantation without protecting them, which served more of the optics than real purpose.</p>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<div class=\"pic1\" xss=removed><img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic1.jpg\" xss=removed>\r\n<h3>Meeting With Local Authorities For Execution Of The Project</h3>\r\n</div>\r\n\r\n<h4>ACTUAL WORK DONE</h4>\r\n\r\n<p xss=removed>Plantation activities carried out on both side of dam in different layers considering plant height for beautification of forest and soil accretion appropriate for particular plants. Total 1000 different types of sapling (App 2 feet height) have been planted on both side of dam out of that 800 mangrove plants planted in forest land and 140 food producing plant, 60 domestic plants have been planted in ownership land. The following are the configurations:-</p>\r\nA. Plantation process in wet & saline river side forest land.\r\n\r\n<ul>\r\n <li>(a) 300 Byne trees have been planted in the first Layer from low wet land near river. This species produce more oxygen in the air, hold the soil and can save the adjacent village from storm.</li>\r\n <li>(b) 100 Kholse trees have been planted next to the Byne tree in the first Layer close to the river. This species produce flower for best quality honey.</li>\r\n <li>(c) 20 Dhundal trees have been planted next to the Kholse tree in the first Layer close to the river. This species produce a beautiful looking fruit.</li>\r\n <li>(d) 100 Goran tree have been planted second layer towards dam. This species can strongly grip the wet soil.</li>\r\n <li>(e) 230 Kakra tree have been planted in the third layer towards dam. This species can strongly grip the wet soil and gain a good height.</li>\r\n <li>(f) Finally close to the dam, 50 Sundari trees have been planted. That will look beautiful from river side as well as from dam.</li>\r\n</ul>\r\n\r\n<div class=\"pic1\" xss=removed><img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic2.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic3.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic4.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic5.jpg\" xss=removed>\r\n<h3>Local People Engaged For Mangrove Plantation In Forest</h3>\r\n</div>\r\nB. Plantation process in on other side of the dam.\r\n\r\n<ul>\r\n <li>a) 30 Mahogany trees have been planted in the first Layer from dam on slope. This is a precious species of tree.</li>\r\n <li>b) 30 Lambu trees have been planted in the next layer on plain land. This species grow very high in sort time.</li>\r\n</ul>\r\n\r\n<p xss=removed>Suggested Method was Miyayiki process. However process could not be fully adhered to because of various practical reasons.</p>\r\n\r\n<div class=\"pic1\" xss=removed><img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic6.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic7.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic8.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic9.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic9.jpg\" xss=removed></div>\r\nC. Plantation process in Private land of beneficiaries on other side of the dam\r\n\r\n<p xss=removed>The rationale for planting Cocoanut trees and Beetle nuts is due to the fact that in the event of salt water ingress, these trees will continue to survive to support the family’s economy, albeit land degradation is distinct possibility in future.</p>\r\n\r\n<ul>\r\n <li>a) 40 Coconut trees have been planted around a pond. These will produce fruits from 6th year and help economic support to the family.</li>\r\n <li>b) 100 Beetle nut trees have been planted around a pond in between coconut trees. It will produce fruit from 5th year and help economic support to the family.</li>\r\n</ul>\r\n<em>Initial Damage: - 6 Mangrove Plants (by Goat Ingress…People were sensitized and damaged plants replaced)</em></div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>BARRICADING</h4>\r\n\r\n<p xss=removed>Enter plantation activities were first barricaded by wire fence and net before plantation.</p>\r\n\r\n<div class=\"pic1\" xss=removed><img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic11.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic12.jpg\" xss=removed></div>\r\n\r\n<p xss=removed>Modus operandi of Healthy Climate Initiative conforms to its network thinking in respect of cluster concept, multi layer plantation of different varieties of plants in sequence covering Mangrove, Miyayaki process for high growth plant and Fruit bearing trees for blending ecology and economy for sustainable process in line with Kaveri Calling concept for income generation in future. HCI believes putting more efforts and resources on protecting plants than the cost of the plants and carry out these out of their own investment. It was observed that many organizations did plantation without protecting them, which served more of the optics than real purpose.</p>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>FUTURE SUSTAINABILITY</h4>\r\n\r\n<p xss=removed>In order to sustain this pilot this project in the long term, arrangement has been made to water, to put organic manure and care for these plants for next six months. Water pump with pipes will be procured so that watering can be done easily without putting much manual effort .</p>\r\n\r\n<div class=\"pic1\" xss=removed><img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic13.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic14.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic15.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic16.jpg\" xss=removed></div>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>TIMELINE</h4>\r\n\r\n<ul>\r\n <li>a. Ground activities of Pilot Project started on 25.11.2020</li>\r\n <li>b. Plantation work completed on 12.12.2020</li>\r\n <li>c. Barricading work (90%) on 04.12.2020</li>\r\n <li>d. Pump procurement 25.12.2020</li>\r\n <li>e. Monitoring , Watering and Nourishment of trees :- Continuous for min next 6 months</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>JUSTIFICATION OF THE PROJECT :</h4>\r\n\r\n<p xss=removed>The plantation of mangroves around villages at the Periphery of the Sundarban has direct implication in rural livelihoods by better safety feeling by guarding them from Climate Disaster, Income Generating activities , creating jobs in nursery and planting activities, improve fisheries catch, provide flowers, fruit, fodder and fuel to rural communities and wildlife, improve carbon sequestration.</p>\r\n\r\n<p xss=removed>The ecosystem is showing degradation, with loss of important and globally endangered mangrove species due to felling, disease and altered freshwater inputs, changes to vegetation communities, intense and on-going coastal erosion, retreat and cyclonic disaster.</p>\r\n\r\n<p xss=removed>The Sunder ban delta belts have entered into the danger zone of submerge due rise of the sea level at an alarming rate and had to withstand devastating impact of the recent Amphan storm caused by the Development of vortex in the Pacific Ocean due to abnormal heat flux. Ghoramara & Moushimi Island are disappearing under sea.</p>\r\n\r\n<p xss=removed>Jharkhali is having around 40 km dam that protects this area from sea water ingress during high tide. Menacingly the level of the water during high tide is higher than the Jharkhali plane in most of the areas. An assessment has been made regarding possibility of plantation. Accordingly a clustering plan has been made comprising of 100 meter dam length which will cover Mangrove forestation as well as Agro forestry for income generating activities for adjacent landowners. In a first phase 10 km dam length will be covered which will cover about 100 clusters. This will cover about beneficiaries about 500 households.</p>\r\n\r\n<p xss=removed>Mangroves forests are highly productive and diverse ecosystems, providing a wide range of direct ecosystem services for resident populations. In addition, mangroves function as a buffer against frequently occurring cyclones; helping to protect local settlements and protect the remaining population of Bengal tigers. Knowing the above fact in brief, Jharkhali Gram Panchayat team has agreed to work with HCI in Sundarban for improving the ecology by plantation of mangrove trees across the 40 kilometer long river bed in Sundarban - Jharkhali Region and supporting local villagers to improve their economy.</p>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>REGARDING JHARKHALI PANCHAYAT AREA</h4>\r\n\r\n<p xss=removed>Jharkhali is a village and a gram panchayat within the jurisdiction of the Basanti police station in the Basanti CD block in the Canning subdivision of the South 24 Parganas district in the Indian state of HCI Bengal. It is a flat low-lying area in the South Bidyadhari plains. The Matla River is prominent and there are many streams and water channels locally known as khals. A comparatively recent country-wide development is the guarding of the coastal areas with a special coastal force.</p>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>HOW HCI EXECUTED THE PLAN</h4>\r\n\r\n<p xss=removed>HCI have conducted meeting with Forest Officer, dedicated competent people and villagers on 10 November 2020 with its proposal and desire to work in Sundarban and obtained their whole hearted and overwhelmed approval. Consequently HCI has identified interested persons and beneficiaries in the Jharkhali to assist them in the plantation program. Accordingly First Pilot Project was executed.</p>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<div class=\"pic1\" xss=removed><img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic17.jpg\" xss=removed>\r\n<h3>The Project Implementation Team At The Site</h3>\r\n</div>\r\n\r\n<h4>FUTURE PLAN</h4>\r\n\r\n<ul>\r\n <li>a. In 2nd phase HCI will extend its program by imparting skill development and motivational training for students to work in Sundarban region.</li>\r\n <li>b. HCI will put effort for fund mobilization from various sources.</li>\r\n <li>c. HCI has submitted one proposal for CSR approval</li>\r\n <li>d. If fund can be arranged, Pilot project will be duplicated along another 10 KM, which will develop another 100 clusters.</li>\r\n <li>e. Thereafter HCI will identify the students from the villages and motivate them to generate their energy for creating an ecosystem and give guidance to overcome the hurdles in the wake of progression and equip them to face the reality.</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>BENEFICIARIES</h4>\r\n\r\n<ul>\r\n <li>a. Once the project is implemented, 500 houses will be directly benefited from erosion of their land and earning from fruits produced by the plant.</li>\r\n <li>b. It will create a demand in nursery for their economic development.</li>\r\n <li>c. It will improve ecosystem in the region.</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<div class=\"pic1\" xss=removed><img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic18.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic18a.jpg\" xss=removed>\r\n<h3>Local Women Came Forward To Work In Our Project And They Have Been Rewarded</h3>\r\n</div>\r\n\r\n<h4>BENEFICIARIES</h4>\r\n\r\n<ul>\r\n <li>a. In 2nd phase HCI will extend its program by imparting skill development and motivational training for students to work in Sundarban region.</li>\r\n <li>b. HCI will put effort for fund mobilization from various sources.</li>\r\n <li>c. HCI has submitted one proposal for CSR approval</li>\r\n <li>d. If fund can be arranged, Pilot project will be duplicated along another 10 KM, which will develop another 100 clusters.</li>\r\n <li>e. Thereafter HCI will identify the students from the villages and motivate them to generate their energy for creating an ecosystem and give guidance to overcome the hurdles in the wake of progression and equip them to face the reality.</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>BUDGET VS REAL EXPENDITURE FOR THE PILOT PROJECT</h4>\r\n\r\n<p xss=removed>Cost Estimate (for each cluster i.e. 100 meter length)</p>\r\n\r\n<ul>\r\n <li>a. Cost of 1000 Mangrove Plant seedling : Rs. 10000.00</li>\r\n <li>b. Cost of Plantation by local beneficiaries: Rs. 5000.00</li>\r\n <li>c. Cost of making Barricade to save the plant : Rs. 22000.00</li>\r\n <li>d. Monthly cash reward to the beneficiary for nourishing the plant for a period of six months : Rs. 18000.00</li>\r\n <li>e. Total Budget of the pilot project for a period of six months: Rs 55000.00 (Rupees Fifty five thousand only).</li>\r\n</ul>\r\n\r\n<p xss=removed>Total Expenditure So far: - Rs 43650.00</p>\r\n</div>\r\n\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>PENDING EXPENDITURE</h4>\r\n\r\n<p xss=removed>Cost Estimate (for each cluster i.e. 100 meter length)</p>\r\n\r\n<ul>\r\n <li>a. Cash Rewards for six months Rs 18000.00</li>\r\n <li>b. .5 HP Pump with Pipes :Rs 4000.00</li>\r\n <li>c. Additional Fence/ Labor Etc :- Rs 2500.00</li>\r\n</ul>\r\n\r\n<p xss=removed>Expected Expenditure for First Cluster: - Rs 70,000.00 (Expenditure overshoot by Rs 15000.00)</p>\r\n\r\n<p xss=removed>Above expenditure expenses preclude all visits and associated incidental cost, which are borne by HCI visiting personnel.</p>\r\n<img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic20.jpg\" xss=removed> <img src=\"file:///C:/xampp/htdocs/hci(html)/images/past-event-sundarban1-pic19.jpg\" xss=removed></div>', 'uploads/1610608071eventpic4.jpg', 'uploads/1610608071pic1.jpg', '', '', 'Y'),
(4, 'METHANE WEBINAR', '13th November 2020', '', '', '', '', 'uploads/1611387056past-event-general-pic5.jpg', 'uploads/1611387056pic1.jpg', 'https://www.youtube.com/embed/X4YEcQuppLU', 'https://fb.watch/25v9W4aZT3/', 'Y'),
(5, 'SUNDARBAN VISIT IN RESPECT OF PROPOSED INITIATIVE FOR FORESTATION ALONG THE LINE OF WATERWAYS AT JHARKHALI DELTA', '10th November 2020', '1:30 am', '', '', '<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>NAMES OF THE PERSONS VISITING PERSONNEL FROM HEALTHY CLIMATE INITIATIVE:-</h4>\r\n\r\n<ul>\r\n <li>Shri Ashok Chatterjee</li>\r\n <li>Sri Chandan Bhattacharya</li>\r\n <li>Shri DGhosal</li>\r\n <li>Smt Urmi Ghosal</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>OBJECTIVE OF THE VISIT</h4>\r\n\r\n<ul>\r\n <li>To convene a meeting involving Forest Department and Local Authorities.</li>\r\n <li>To visit the affected areas, land of the beneficiaries, forest land, embankment of the waterways, Damage caused in the dam during Aila and Amphan.</li>\r\n <li>To understand the people&#39;s reaction and finalize the budget in respect of Healthy Climate Initiatives’ (HCI) plan at Jharkhali delta.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>THE FOLLOWING PERSONS ATTENDED THE MEETING</h4>\r\n\r\n<ul>\r\n <li>Local Authorities and Forest Department (All Shri)</li>\r\n <li>Ranjan Mandal, Panchayat Pradhan</li>\r\n <li>Samar Majhi, Landowner,</li>\r\n <li>Akul Biswas, Nursery owner,</li>\r\n <li>Debabrata Pramanik .Dy Ranger.</li>\r\n <li>Bibhuti Ranjan Barui. TMC local vice president.</li>\r\n <li>Bidhan Byne . TMC local president.</li>\r\n <li>Gopal Mistri. Member gram panchyet.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>PROPOSED LOCAL BENEFICIARIES</h4>\r\n\r\n<ul>\r\n <li>Samar Majhi, Landowner</li>\r\n <li>Akul Biswas, Nursery Owner</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>HEALTHY CLIMATE INITIATIVE</h4>\r\n\r\n<ul>\r\n <li>Ashok Chatterjee</li>\r\n <li>Chandan Bhattacharya</li>\r\n <li>D Ghosal</li>\r\n <li>Urmi Ghosal</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>FOLLOWING POINTS WERE DISCUSSED AND AGREED TO:-</h4>\r\n\r\n<p xss=removed>Expectedly all the persons present in the meeting welcomed HCI proposal.</p>\r\n\r\n<p xss=removed>Shri Akul Biswas shared his perspective regarding plantation. Although he is blind, he dedicated his life for the sake of saving nature of Sundarban. He organized 200 women who are offering service in his nurseries.</p>\r\n\r\n<p xss=removed>Healthy climate initiative will take the initiative to plant local trees especially mangroves varieties on forest land as well as on land on the other side of the dam.</p>\r\n\r\n<p xss=removed>Local trees like coconut and beetle nuts will be planted on the land of Shri Samar Majhi to begin with which will be adjacent to so called river or interconnecting waterway.</p>\r\n\r\n<p xss=removed>Approximately 1000 plants will be procured from Mr. Akul Biswas to begin with.</p>\r\n\r\n<p xss=removed>Fruit bearing trees will be purchased locally.</p>\r\n\r\n<p xss=removed>Healthy climate initiative will assume the responsibility of bearing cost for plants from nursery, plantation cost, protecting the trees from domestic animals by Barricade and fencing, watering and maintenance and remunerations to person will be doing this job.</p>\r\n\r\n<p xss=removed>It was suggested that one make shift hut should be made so that the plantation can we monitored. Healthy climate initiative will look into the budget provision and confirm the same.</p>\r\n\r\n<p xss=removed>Healthy climate initiative proposed to address general mass in Jharkhand during sports meet in order to sensitize common imminent climate crisis. Mr. Ranjan Mondal promised to arrange for the same whenever required.</p>\r\n\r\n<p xss=removed>Healthy climate initiative impressed upon the fact that Jharkhali is sitting on an ecological time bomb since height of the water during high tide is higher than the land height with respect to the sea level. In the event of a cyclone during high tide, massive destruction of the land, animal and properties are anticipated. Within the next 10 years, significant part of Sundarban may disappear beneath the water as rivers and sea levels rise. This will put thousands of people on the move. Climate researchers say it’s just the first manifestation of a process that will soon be happening all over the world. Mass migration in Sundarban is about to become the biggest crisis the world has even seen. Sundarban tigers are surviving because of unbelievable care for nature exhibited by common people, although many of them are tiger victims. Common people are so simple without complaints. Every human being should wake up to this reality to support such wonderful yet unfortunate section of this humanity.</p>\r\n\r\n<p xss=removed>Only possible safeguard albeit as temporary measure will be the mangroves plantation on either side of the 38 km long dam in Jharkhali.</p>\r\n\r\n<p xss=removed>Shri Debabrata Pramanik, Dy Ranger shared his experience and suggested that trees like Eucalyptus should not be planted. Unscientific plantation may affect fragile Sundarban’s biosphere. HCI appreciated that tree plantation will be done with knowledge of local people and Mayayaki process may be adopted. Agro forestry as solution functionality in line Kaveri Calling Model is proposed for sustainability. HCI felt ecological concerns should become everybody’s concerns without pitching ecology against economy.</p>\r\nForest authority and administration promised to extend Healthy Climate Initiative all the co-operation required in respect of NOC, mobilizing personnel, awareness campaign etc.\r\n\r\n<p xss=removed> </p>\r\n\r\n<p xss=removed>Meeting ended with vote of thanks and pleasantries.</p>\r\n\r\n<p xss=removed>HCI team made extensive survey of the locations especially along the side of dam especially the proposed the site of Mr. Samar Majhi and got the assessment regarding quantum of work involved.</p>\r\n\r\n<p xss=removed>As far as HCI is concerned, it will be the priority to syndicate fund from possible sources and look for the government fund after concluding registration process, which is being pursued.</p>\r\n\r\n<p xss=removed>Some of the relevant snaps taken during the visit are shared.</p>\r\n</div>\r\n</div>', 'uploads/1611387604eventpic1.jpeg', 'uploads/1611387604pic1.jpg', '', '', 'Y'),
(6, 'THE NEED FOR CARBON DIOXIDE REMOVAL', '20th September 2020', '20:30pm (IST)', 'Healthy Climate Initiative', '', '<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<p xss=removed>The programme started with a brief introductory speech from the President from HCI-Dr. Soumitra Das. Following by a short video of 5 minutes, based on the future climatic conditions of Kolkata in 2050.</p>\r\n\r\n<p xss=removed>The main part of the webinar was the lecture of Dr. Peter Wadhams of 35 minutes. The overall lecture of Dr. Peter Wadhams was simple, specific and good. Before coming into his main topic, he named some books- “A Farewell to Ice” and a movie based on his books named “Ice of Fire” which was premiered last year 2019. His entire speech deals with -How Carbon Dioxide (CO2) is affecting our climate? What happens when the level of Caron Dioxide get increases? What are the causes for the rise of CO2 level in the atmosphere? Why it is so important to be control the level of CO2 in the air? How can it be controlled? Etc...</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>HOW CARBON DIOXIDE (CO2) IS AFFECTING OUR CLIMATE?</h4>\r\n\r\n<p xss=removed>According to the theory, Carbon Dioxide (CO2) controls temperature because the CO2 molecules in the air absorb infared radiation. The Carbon Dioxide and other gases in the atmosphere are virtually transparent to the visible radiation that delivers the sun’s energy to earth.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>WHAT ARE THE CAUSES FOR THE RISE OF CO2 LEVEL IN THE ATMOSPHERE?</h4>\r\n\r\n<ul>\r\n <li>Excessive burning or use of fossil fuels.</li>\r\n <li>Industrial smoke</li>\r\n <li>Vehicle emissions</li>\r\n <li>Deforestation. etc</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>WHY IT IS SO IMPORTANT TO CONTROL THE LEVEL OF CO2 IN THE AIR?</h4>\r\n\r\n<p xss=removed>Dr. Peter Wadhams stated that the earth has been warming up rapidly since the 19th century. The excessive release of CO2 in the atmosphere has led to the rise of temperature. At Mauna Loa Obserevatory, the CO2 concentration in the atmosphere was recorded of two consecutive years 2019 and 2020.In September 18, 2020, the concentration was 411.15ppm while in the previous year it was recorded as 408.59ppm. That is, in single year the CO2 concentration is increased by 2.56ppm.</p>\r\n\r\n<p xss=removed>Due to this rising phenomenon, the climatic condition of the planet was largely affected. There were some big impact in terms of :</p>\r\n\r\n<ul>\r\n <li>The average increase in surface temperature since the 1951-1980 reference period is greatest in Arctic.</li>\r\n <li>August1 2019 – Biggest ever ice loss from Greenland Ice Sheet in a single day 12.5 billion tons of ice. Air temperature was 21 degree Celsius.</li>\r\n <li>Simulation of the jet stream has been changed. This stream is used to flow in a straight path but due to the variation of temperature at different places has made its path uneven.</li>\r\n <li>Crops based countries like India is highly affected. There is a drastic declination in crop production.</li>\r\n <li>The surface ice sheet of the Greenland has turned black because due to the dirt which was over the ice for last decades or centuries, is now getting accumulated on its top. So, it radiates less solar radiation and absorbs more radiation and thus the melting process is more accelerated resulting in rising sea level. Countries like Italy, Indonesia are already in a state of submerging.</li>\r\n</ul>\r\n\r\n<p xss=removed>That’s why it is so important to be controlled.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>HOW CAN IT BE CONTROLLED?</h4>\r\n\r\n<p xss=removed>Warming can be slowed down by reducing the carbon emissions, usage of fossil fuels and switching to renewable energy like solar, wind, hydro, nuclear etc. Some examples of it are:</p>\r\n\r\n<ul>\r\n <li>Re-Afforestation</li>\r\n <li>Methane outbreaks can be stopped by restoring the arctic Sea ice by GEOENGINEERING’</li>\r\n <li>Only real solution is taking CO2 out of atmosphere (Direct Air Capture.</li>\r\n <li>Carbon Engineering- This technology uses CO2 that has been directly captured from air to synthesize clean transportation fuels.</li>\r\n <li>Power to gas is a process by which the captured CO2 and renewable hydrogen are catalytically methanated in modular rectors by French company ATOMSTAT. Then the methane is liquefied and used to fuel natural gas lorries.</li>\r\n</ul>\r\n\r\n<p xss=removed>After the speech by Dr. Peter Wadhams, there was a 15 minutes time for Questions and Answers and the programme ended with a vote of thanks from our Vice-President Mr. Chandan Bhattacharyya.</p>\r\n\r\n<p xss=removed>Reported By: Surangama Banerjee, HCI Intern.</p>\r\n</div>\r\n</div>', 'uploads/1611388041eventpic1.jpeg', 'uploads/1611388041pic1.jpg', '', 'https://fb.watch/25vdqJTwDF/', 'Y'),
(7, 'HCI WEBINAR..CONNECTING 3WS', '16 Aug 2020', '', '', '', '<div class=\"upcoming-text-row clearfix\">\r\n<div class=\"upcoming-text\">\r\n<h4>ABOUT MR RITURAJ PHUKAN</h4>\r\n\r\n<p> He is an environmental writer, adventurer, and climate change mentor based out of Assam. He has been on expeditions to Antarctica and the Arctic region (thrice) for the first-hand experience of the impacts of climate change. Raj was personally trained as a Climate Reality Leader by Al Gore and was featured in the former US Vice-President’s 2017 book ‘An Inconvenient Sequel: Truth to Power’. He serves the Climate Reality Project India as the National Coordinator for Biodiversity.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\">\r\n<div class=\"upcoming-text\">\r\n<h4>EXCERPTS OF HIS SPEECH</h4>\r\n\r\n<p> He talked about the Indian water crisis. Water has emerged as major problem in respect of climate change. Water table is falling very quickly.</p>\r\n\r\n<p> Half the population are now water stressed. Farmers are committed suicide in large numbers.</p>\r\n\r\n<p> Talking about the blue marble in the sky that is earth, he said that human being are adding as much as 110 million tons of pollutants into the thin shell of upper atmosphere every 24 hours .Energy released by manmade action leading to the global warming pollution is now equivalent to exploding 500000 Hiroshima atomic bombs per day 365 days a year.</p>\r\n\r\n<p> In India people started dying in hundreds because of the extreme rise in temperature during summer. He highlighted the fact that India is suffering worst water crisis in history as per Niti Aayog. Currently 600 million Indians face high to extreme water stress. In North Gujarat water tables are falling 20 feet per year. 95% in Tamilnadu wells have already dried up. India faces severe ground water crisis and 16.6 million acres of land have been lost to salination. Thousands of farmers have committed suicide across the country the situation is worst in Maharashtra.54% of India faces extremely high water stress .Glaciers on the Tibetan plateau play a key role in supplying perennial water for many countries but there is a growing concern about the impact of glaciers melting on the Tibetan plateau and the availability of water in the region.</p>\r\n\r\n<p> More than a third the glaciers in the Hindu Kush Himalayan mountain range will vanish by the end of the century even if global warming is contained at 1.5 degrees centigrade in the best-case scenario. Two billion people are going face major water catastrophe in coming years.</p>\r\n\r\n<p> He imported importance on the fact that India is deeply vulnerable to climate change because of three critical risk factors they are high agricultural dependence, long coastline and high fossil-fuel independence. India is already facing the initial effect on climate.</p>\r\n\r\n<p> Solution suggested by him arranging from rain water harvesting and Community water centre. Water is the local issue of global climate change for people and for biodiversity.</p>\r\n\r\n<p> Huge number of animals all fighting against each others for water. It has been already reported that significant number of elephants have died of water shortage in Zimbabwe. Wildlife experts are saying large-scale migration of animals from nearby wildlife parks to the sanctuary in search of water. Because of the low adaptive capability of Asian elephants rate of death of elephants and other animals are increasing which is a major concern.</p>\r\n\r\n<p> He also highlighted the facts that huge change in vegetation will also affect the climate.</p>\r\n\r\n<p> Even in South Pole the Penguins cannot stay in current location and in one documentary it was already shown that this species has receded to southwards.</p>\r\n\r\n<p> It is reported in 2018 that population sizes of wildlife decreased by 60% globally between 1970 and 2014.</p>\r\n\r\n<p> Reindeers are dying because of hot ice phenomenon cause of unusual rain which they are unable to penetrate.</p>\r\n\r\n<p> 90% of the extra heat trapped by man-made global warming pollution goes into the ocean.</p>\r\n\r\n<p> This is causing many deoxygenated zones in the ocean and turned out to be the killing fields of marine animals.</p>\r\n\r\n<p> Oxygen levels in some tropical regions and dropped by a staggering 40% in last 50 years because of ocean heating.</p>\r\n\r\n<p> Climate change already poses serious problems because of Ocean acidification. But deoxygenation is the most pressing issue facing sea animals today.</p>\r\n\r\n<p> A multitude of marine species from bottom dwellers like fish and octopuses are Gasping for oxygen. Significant portions of aquatic creatures are being increasingly deprived of oxygen.</p>\r\n\r\n<p> It is estimated that populations of marine vertebrates decline 49% on average from 1972 to 2012.</p>\r\n\r\n<p> Sex cycle and sex ratios in married animal especially sea turtles are determined by temperature. The world&#39;s oceans are now 30% more acidic on average than they were before the industrial revolution. This has got the extremely bad impact for marine snails that are unable to grow their shells that provide food for pink Salmon mackerel and herring.</p>\r\n\r\n<p> If the water is hot, corals will expel the algae in their tissue causing the coral to turn completely white. This is called coral bleaching.</p>\r\n\r\n<p> In Great Barrier Reef over 90% of the Great Barrier Reef was wiped out by coral bleaching caused by abnormally warm water.</p>\r\n\r\n<p> Decrease in population of pollinating birds is a major concern for the future of the world.</p>\r\n\r\n<p> It is vitally important for the health of the planet there are more than 30000 bee species around the world. Climate change is affecting the pollinators by disrupting the synchronised timing of flower blooming and the timing at which these pollinated flowers are blooming earlier in the growing season due to rising temperature. Fertility of most flowering plants including nearly all fruits and vegetables depends on animal mediated pollination. There has been a 98?cline in insect mass over 35 years in the forest of Puerto Rico and 86?crease in monarch butterfly numbers in California.</p>\r\n\r\n<p> Deceasing insect number threaten the collapse of nature. World&#39;s food supply under severe threat from loss of biodiversity leading to food production in steep decline. The world&#39;s capacity to produce food is being undermined by humanity’s failure to protect biodiversity.</p>\r\n\r\n<p> Avoiding dangerous levels of climate change is still just about possible, but will require unprecedented effort and coordination from governments, businesses, citizens and scientists. Scientists have been warning that time is fast running out to stave off the worst effects of warming, and some milestones may have slipped out of reach.</p>\r\n</div>\r\n</div>', 'uploads/1611389145eventpic1.jpeg', 'uploads/1611389145pic1.jpg', 'https://www.youtube.com/embed/t6tNP0ybyXk', 'https://fb.watch/25vm6rmRak/\r\nhttps://youtu.be/t6tNP0ybyXk', 'Y'),
(8, 'WORLD ENVIRONMENT DAY', '5 June 2020', '11 am to 12 pm (US ET) and 8:30 pm to 9:30 pm (IST)', '', '', '<p xss=removed> Guests: Prof. Arunabha Majumdar, an eminent scientist of Jadavpur University,(SWRE)</p>\r\n\r\n<p xss=removed> Dr. Anirban Roy, research officer environment and West Bengal Biodiversity Board.</p>\r\n\r\n<p xss=removed> Platform: Zoom, Initiative taken by HCI, Kolkata and Dr.Soumitra Das, President HCI.</p>\r\n\r\n<p xss=removed> This HCI webinar was conducted on the on June 5th,to mark the occasion of World Environment day.</p>\r\n\r\n<p xss=removed> The main programme was started with the eminent speaker, Prof. Arunabha Majumdar on the topic of Pollution & Biodiversity. He mainly explained about the type of pollutions we are badly experiencing today ,its’ consequence and the measures initiated by the government, where he stated about industrial pollution that predominantly affects the water & air ,thus making unsuitable for human beings, animals, birds even the micro organisms. He also stated with some examples accompanied by slide shows ,where he highlighted some exemplary interesting facts and figures. One of such example was about East Kolkata Wet Land ,covers 125 sq. kilometre where almost 750 million litres of waste water and sewage mixed with industrial pollutants, heavy metals different in organic components, cyanide etc. is treated and is used in various ways like pisciculture (18,000- 20,000 metric tons of fish is produced) and the treated water is later released at kulti, bidadhori and finally it drains out in Sundarbans. The whole plant works on solar energy and a semi-biotic environment is maintained, which means it does no harm to the biodiversity. West Bengal has a total number of 17 rivers which get polluted as per National Records due to industrial waste .As a solution, he stated that a good surveilliance and legislation must be implemented. Some stringent laws are already there like Biodiversity Act 2002, National Green Tribunal Act 2010 (exclusively acts environment protection and conservation of forests and other natural resources)etc. But the most important is to maintain discipline on our part.</p>\r\n\r\n<p xss=removed> Our second speaker Dr. Anirban Roy, most eloquently described about the topic of “coexistence and dependency between us and surrounding nature in the form of Biodiversity”, where he mainly stated about the variation of the environment from place to place with respect to topography, climate, soil of that place. He said that not only plants and wild animals, birds or insects varies but also the Homo Sapiens (human beings) characteristics in terms of genes. Biodiversity gives a immense services to the all living beings which include economic value, food value, ethical and aesthetic values. “India – The home of Biodiversity”, is one of those 7 most biodiversity countries in the world with varied landscapes, climate, mountains, coastal and laterite regions. He said that there are total 35 hotspots present in the world out of which 4 hotspots are in India (The Himalayas, Western Ghat, Sri Lanka, Indo-Burma and Sundaland). But due to the increase demand of economic and food values the Indian Biodiversity is in great danger. Over hunting/poaching, overgrazing, pollution, rising human pollution etc, are some causes that brings a great threat to extinction of various species, climate change, melting of glaciers & deterioration of water quality, change in crop yield. Therefore, to stop this declination of biodiversity, we should take care and protect it.</p>\r\n\r\n<p xss=removed> The webinar ended with the vote of thanks given by Mr. Chadan Kr. Bhattacharya,Vice- President of the organisation.</p>', 'uploads/1611389766eventpic2.jpg', 'uploads/1611389766pic1.jpg', '', '', 'Y'),
(9, 'EARTHDAY CELEBRATION', '22nd April 2020', '8.30 - 10.00 PM', '', '', '<p><a href=\"https://www.facebook.com/watch/live/?v=829776774197851&ref=watch_permalink\" target=\"_blank\">HCI Earth Day 2020 on Facebook Live</a></p>\r\n\r\n<p> The Purpose of the event was to create an awareness of Climate Change among the people on the 50th anniversary of Earth Day, with a focus on Climate Restoration, i.e., removing CO2 from the atmosphere to a safe and healthy level, as a pathway to ensure the survival and flourishing of humanity. HCI planned the event in two parts:<br>\r\n(1) Identification of problem, a case study on devastating effects of climate change in Sundarbans, West Bengal, India, and another part of the world.<br>\r\n(2) The solution, i.e. climate restoration. The event was lined up with the leaders of the global campaign for climate restoration and eminent speakers on the following topics.</p>\r\n\r\n<p> 1. Climate Preparedness in the Delta of Sundarbans by Dr. Sugata Hazra, Professor of Coastal Zone Management, Jadavpur University.</p>\r\n\r\n<p> 2. Climate Restoration & Leadership in a Conversation among Mr. Peter Fiekowsky, Co-founder and Chairman of the foundation for climate restoration (F4CR), Mr. Rick Parnell, CEO of F4CR and former COO of United nations foundation and Dr. Erica Dodds, COO of F4CR.</p>\r\n\r\n<p> 3. Waging Optimism, a Pathway to Ensure the Survival and Flourishing of Humanity, and People&#39;s New Deal Pillar: Climate Restoration Emergency Action (CREA) by Dr. Paul Zeitz, Funder of Build A Movement 2020 and Co-chair of the COVID-19 Emergency Response Group.</p>\r\n\r\n<p> The event began with welcoming the audience by Mr. Dwijadas Ghosal, General Secretary of HCI, and explaining the significance of Earth Day. It was followed by Dr. Soumitra Das, President of HCI, elaborating HCI’s mission, activities, and calling for people’s involvement in the movement for climate restoration. Then, the event moved to the main topics by the eminent guest speakers.</p>\r\n\r\n<p> TOPIC-1: Climate Preparedness in the Delta of Sundarbans by Dr. Sugata Hazra,</p>\r\n\r\n<p> Key Points: Dr. Hazra started with a reference to the current pandemic situation of the world due to COVID-19, something that we were not prepared for and resulting in loss of over two hundred thousand lives, morbidity, and loss of livelihood. He stated that if the current adverse climatic conditions are not taken care of, the catastrophic consequences will be faced by humanity. He has stated how global warming is responsible for the sea level rise in the coastal areas. The &#39;Mangrove Forest&#39;, \"a national heritage site\" is in danger due to the advancing sea. He shared his incredible research and works in the Sundarban Delta. Dr. Hazra concluded his speech by a powerful message that, \" there is no vaccine against climate change, we ourselves need to be prepared at the individual, national and global levels to embrace a more sustainable lifestyle in order to win the struggle for existence in the Sundarban Delta and in the world and let this be our pledge on Earth Day.\"</p>\r\n\r\n<p> TOPIC -2: Climate Restoration Leadership in Conversation among Mr. Peter Fiekowsky, Mr. Rick Parnell, and Dr. Erica Dodds.</p>\r\n\r\n<p> Key Points: The discussion was presented in a fireside chat format in which the anchor Ms. Alexandra Pony from F4CR engaged Mr. Fiekowsky, Mr. Parnell, and Dr. Dodds in a discussion on the origin of the idea, the strategy of the Foundation for Climate Restoration, progress, and next steps. What is the origin of climate restoration? To stop emitting carbon dioxide in the air is common knowledge to the people for many years. Mr. Fiekowsky came up with the idea of climate restoration saying now we must take out the carbon dioxide that we have put in the atmosphere. Otherwise, all the human progress we have made will be meaningless. Consequently, Mr. Fiekowsky created the Foundation for Climate Restoration (F4CR) to advance climate restoration and make the world safe and healthy for the future generations.</p>\r\n\r\n<p> What is climate restoration? Climate restoration in its simplest term is to remove the carbon dioxide that we have been putting in the atmosphere for the last two centuries and bring it to the preindustrial level of under 300 parts per million where humanity has survived and thrived for thousands of years. Mitigation and bringing the carbon dioxide emission to net-zero by 2050 are very important, but most people do not realize that 95% of the carbon dioxide that is causing global warming with all its devastating effects will still be there even if we stop emitting carbon dioxide in 30 years. F4CR is working on market-driven approaches for both technological solutions that can be employed to remove the excess carbon dioxide by 2050.</p>\r\n\r\n<p> Is it possible to restore climate by 2050? F4CR and the top scientists in the area also believe that it is possible to restore climate by 2050. We knew how to remove carbon dioxide from the air 100 years ago and the processes for “direct air capture” were known for many decades– so, these are not new and emerging technologies; we are learning to do it more efficiently and cheaply. F4CR is working with the United Nations, national governments, local governments, technology entrepreneurs, organizations with a similar mission, universities like Cambridge University and Arizona State University, faith community from the Vatican to all different faiths to bring the political will and to help build ecosystem necessary to restore climate by 2050.</p>\r\n\r\n<p> What technologies are out there for climate restoration? Fair numbers of technologies are out there to remove carbon dioxide from the air. F4CR selects technologies that meet three criteria: (1) permanence, i.e. the removal of carbon dioxide should be permanent, (2) scalability, i.e., it should be able to remove all the excess carbon dioxide in 20 years, and (3) financeable, i.e., someone is willing to pay for the implementation. Using these criteria, F4CR found technologies that nature has been using to remove carbon dioxide for millions of years, which generates confidence about the safety of these technologies. For example synthetic limestone. 99% of all carbon on our planet are held in limestone through natural processes. We can do the same chemistry in the laboratory, and large factories to create synthetic limestone removing carbon dioxide in copious amounts from the air and sell them in the market for building roads, bridges, and buildings at a comparable cost. The demand for limestone sufficiently high to restore climate in 20 years. Another approach is restoring photosynthesis in the ocean by mixing necessary nutrients in the ocean. Because of the vast size of the ocean, the increase in photosynthesis would remove enough carbon dioxide from the atmosphere and restore climate in 20 years. As a by-product, it will increase fish production which can finance the cost of the nutrient.</p>\r\n\r\n<p> What is the strategy to implement these technologies? The technology entrepreneurs and universities are working on these technologies separately and without the knowledge of the potential investors. In addition, these technologies need to be sufficiently tested to ensure confidence among the investors, and favorable policies need to be created to attract investment. F4CR is connecting investors, technology entrepreneurs, and universities, and working with governments to conduct tests, and create favorable policies for climate restoration technologies.</p>\r\n\r\n<p> What is progress has been made so far? (1) The most exciting progress is that faith leaders, corporate leaders, investors, student community have begun to understand the need for climate restoration and demand for it. (2) The affordable technologies for carbon removal are growing, (3) The Vatican, and UN, i.e. the high priests to determine what is important for humanity, are showing interest in climate restoration.</p>\r\n\r\n<p> Note that HCI is a partner of F4CR.</p>\r\n\r\n<p> TOPIC - 3: Waging Optimism, a Pathway to Ensure the Survival and Flourishing of Humanity, and People&#39;s New Deal Pillar: Climate Restoration Emergency Action (CREA) by Dr. Paul Zeitz. Key Points: Dr. Paul Zeitz has expressed his excitement to all the audience in HCI, India in recognition and honor of Earth Day. He stated that our existence in the current global pandemic situation and its effect on economic fragility is threatened. He spoke about his vision to a positive future of being optimistic about addressing the climate emergency. He talked about his research on climate restoration, i.e., the cycle of &#39;three pillars of climate action&#39;, namely Restoration – Mitigation and Adaptation. He explained the focus of Climate RestorationEmergency Action (CREA) led by him - enumerating efforts to catalyze a fast transition to a net-zero carbon economy by 2030. He encouraged all the audience towards the goal to restore climate and create a sustainable atmosphere. Dr. Paul Zeitz is looking forward to work with HCI and every individual who is committed to restore the climate and bring this vision into reality over the coming weeks, months, and years. He believes that we can do it if we work together, learn together, and take action together.</p>\r\n\r\n<p> The event ended with offering a vote of thanks by Mr. Chandan Kumar Bhattacharyya, Vice President of HCI.</p>', 'uploads/1611390015eventpic3.jpg', 'uploads/1611390015pic1.jpg', 'https://www.youtube.com/embed/qsmbBMMhj6A', 'https://fb.watch/25voLzRQpd/', 'Y');
INSERT INTO `hc_event` (`event_id`, `event_name`, `event_date`, `event_time`, `event_host`, `event_venue`, `event_content`, `event_pic`, `event_image`, `event_video_link`, `event_information_link`, `status`) VALUES
(10, 'GENERAL BODY MEETING', '12th January 2020', '11 AM - 5:30 PM', '', 'Sundargram, Rajendrapur, Ghatakpukur, North 24 Pgs, West Bengal, http://sundargram.com/', '<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>AGENDA</h4>\r\n\r\n<p xss=removed> Snacks and Mingling</p>\r\n\r\n<p xss=removed> A Bengali Animation Film on Climate Change, Tomorrow</p>\r\n\r\n<p xss=removed> Dr. Soumitra Das on Climate Change and HCI (mission, strategy, activities, etc.)</p>\r\n\r\n<p xss=removed> Lunch</p>\r\n\r\n<p xss=removed> Ms. Lata Bhatia on Zero Waste Living</p>\r\n\r\n<p xss=removed> Mr. Dwijadas Ghosal on Land Degradation: 3:15 PM – 4:00 pm</p>\r\n\r\n<p xss=removed> Formation of Governing Body / Executive Committee</p>\r\n\r\n<p xss=removed> 2020 Calendar : 4:30 PM - 5:15 PM</p>\r\n\r\n<p xss=removed> Website Launch : 5:15 PM – 5:30 PM</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>MINUTES</h4>\r\n\r\n<p xss=removed> A general body meeting was held n Sundargram, a quaint village in West Bengal, about 35 kilometers from Kolkata, on January 12. The meeting started at 11 AM. Fourteen people attended the meeting from varied backgrounds - engineers, teachers, entrepreneurs, and social/community activists. They came from both private companies as well as government agencies, and NGO. Soumitra Das explained the purpose of the meeting as to understand<br>\r\n(1) understand causes/effects of climate change,<br>\r\n(2) have a common understanding of HCI’s mission and direction,<br>\r\n(3) form a governing body / executive committee</p>\r\n\r\n<p xss=removed> A Bengali animation film on climate change titled “Tomorrow” was shown. The film portrayed lucidly the causes of climate change, and its devastating effects on Bangladesh and ended it with a positive note that humans, who created the climate crisis, can also solve it and save the world. A general discussion about climate change ensued after the film. This set the stage for the next discussion.</p>\r\n\r\n<p xss=removed> Soumitra Das presented<br>\r\n(1) causes and effects of climate change,<br>\r\n(2) 3 pillars of climate change solutions,<br>\r\n(3) the reasons for HCI and its mission.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>KEY POINTS INCLUDE:</h4>\r\n\r\n<p xss=removed> Reasons for Climate Change: Humans have been emitting CO2 in the atmosphere for the last 200 years. Since CO2 stays in the atmosphere for over 1000 years, its cumulative effects increased the concentration level drastically. Today, the C02 concentration level s 415 ppm, 40% more than the concentration level before the pre-industrial time period. This excess CO2 is trapping more heat, making global temperature to rise. The last time C02 reached this level was 3 million years ago and the temperature was 2°–3°C higher, and the sea level was 50 - 80 feet higher.</p>\r\n\r\n<p xss=removed> Effects: The effects of climate change are: frequent destructive hurricanes, melting of glaciers/arctic, rising sea levels, frequent coastal flooding, destruction of marine ecosystems, droughts, and heatwaves, etc. 150 million people would be underwater due to sea-level rise by 2050. Asia would be worst affected - large parts of Shanghai, Kolkata, Mumbai, Dhaka, Chittagong, Jakarta, and Hanoi could be wiped out</p>\r\n\r\n<p xss=removed> Solutions: Mitigation, Adaptation, and Restoration are the three pillars of climate change solutions. Mitigation focusses on the reduction of carbon emissions. It is the mainstream effort to combat climate change. Adaptation is localized efforts to cope with its effects of climate change - it does not combat the root cause of climate change. Restoration focusses on the reduction of CO2 from the atmosphere to the pre-industrial level of 300 ppm. HCI believes that while mitigation and adaptation are necessary, they are not sufficient - restoration is needed to completely alleviate the perils of climate change. Mission: HCI’s mission is to restore climate, i.e., remove the excess carbon dioxide and make the climate safe and healthy for future generations.</p>\r\n\r\n<p xss=removed> Activities: The HCI will focus on to : (A) Create awareness of global warming and climate change, (B) Promote policies and projects that would reduce excess greenhouse gases from the atmosphere in India, and (C) Create partnerships and alliances with organizations of similar vision and strengthen the global movement to fight for climate restoration. He proposed that HCI organizes a climate change conference with 26 schools in Barrackpore, a suburb in Kolkata, on the Earth Day, April 22, 2020.</p>\r\n\r\n<p xss=removed> Soumitra Das ended the presentation saying that HCI is small today but its vision is not. When the future of humanity is at stake, we should focus only on climate change and not work on the edge. He mentioned about the partnership with Foundation for Climate Restoration (F4CR), an organization based in the US. He emphasized the importance of working closely with other similar global organizations to make a difference. He also mentioned about the possibility of representing HCI on the climate restoration conference with F4CR with at the UN in September 2020.</p>\r\n\r\n<p xss=removed> Lata Bhatia spoke on Zero Waste Living. Key points include” Garbage and wastes are causing havoc in Kolkata - they are also adding CO2 to the atmosphere. She talked about composting food wastes at home and using it for gardening or gifting it friends who can use it for gardening. Say NO to single-use plastics Reuse existing plastic bags at home</p>\r\n\r\n<p xss=removed> Dwijadas Ghosal talked about the cause and effects of land degradation in India. The key points include the following. Land degradation should be an immediate priority in India because, if it is not addressed, people will die out of hunger in the coming years. About 32% of India’s land area or 105 million hectares is undergoing land degradation. The primary reason for land degradation is de-forestation. Because trees are cut, the fertile, nutritious topsoil is washed away in rainfall water. This is a great loss to Indian farmers who often depend on the natural fertility of the soil to grow their crops. Already more than 3 lacs farmers have committed suicide since 1995. Because no media is interested in that, we are kept in the darkness in a systematic way. The solution to this problem is to create agroforestry and address plastic pollution - which, according to him, should be the top priority for India. The additional benefit of agroforestry is that it also sequesters CO2 from the atmosphere.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"upcoming-text-row clearfix\" xss=removed>\r\n<div class=\"upcoming-text\" xss=removed>\r\n<h4>GENERAL MEMBERS FORMED THE GOVERNING BODY / EXECUTIVE COMMITTEE WITH THE FOLLOWING MEMBERS</h4>\r\n\r\n<p xss=removed> Soumitra Das - President</p>\r\n\r\n<p xss=removed> Chandan Bhattacharya - Vice President</p>\r\n\r\n<p xss=removed> Dwijadas Ghosal - General Secretary</p>\r\n\r\n<p xss=removed> Sudhin Nandi - Treasurer</p>\r\n\r\n<p xss=removed> Proma Das - Officer/Media and Communications</p>\r\n\r\n<p xss=removed> Ashoke Chatterjee - Officer/Membership</p>\r\n\r\n<p xss=removed> Somdatta Basu - Officer/Events</p>\r\n\r\n<p xss=removed>There was a discussion the Executive Committee should called Governing Body. Some members said that Governing Body should be appropriate per the society registration act. Sudhin Nandi will enquire about the The proposed bi-laws suggested no fees for general members while the members of the executive committee / governing body said that there should not two membership fees for general and executive members. They suggested 2-3 tier membership structures to raise the corpus. Sudhin will look into this. The hosting of the conference with school children on Earth Day was briefly discussed - there was no disagreement. This needs further discussion with the EC members. The meeting ended at 5 PM.</p>\r\n</div>\r\n</div>', 'uploads/1611390176past-event-general-pic5.jpg', 'uploads/1611390176pic1.jpg', '', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_eventpic`
--

CREATE TABLE `hc_eventpic` (
  `eventpic_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `eventpic_image` varchar(255) NOT NULL,
  `event_video` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_eventpic`
--

INSERT INTO `hc_eventpic` (`eventpic_id`, `event_id`, `eventpic_image`, `event_video`, `status`) VALUES
(5, 2, 'uploads/1611386836past-event-general-pic1.jpg', '', 'Y'),
(6, 2, 'uploads/1611386846past-event-general-pic2.jpg', '', 'Y'),
(7, 2, 'uploads/1611386853past-event-general-pic3.jpg', '', 'Y'),
(8, 2, 'uploads/1611386862past-event-general-pic4.jpg', '', 'Y'),
(9, 4, 'uploads/1611387434past-event-general-pic1.jpg', '', 'Y'),
(10, 4, 'uploads/1611387444past-event-general-pic2.jpg', '', 'Y'),
(11, 4, 'uploads/1611387451past-event-general-pic3.jpg', '', 'Y'),
(12, 4, 'uploads/1611387456past-event-general-pic4.jpg', '', 'Y'),
(13, 5, 'uploads/1611387810past-event-sundarban-pic1.jpg', '', 'Y'),
(14, 5, 'uploads/1611387824past-event-sundarban-pic2.jpg', '', 'Y'),
(15, 5, 'uploads/1611387835past-event-sundarban-pic3.jpg', '', 'Y'),
(16, 5, 'uploads/1611387842past-event-sundarban-pic4.jpg', '', 'Y'),
(17, 5, 'uploads/1611387850past-event-sundarban-pic5.jpg', '', 'Y'),
(18, 5, 'uploads/1611387860past-event-sundarban-pic6.jpg', '', 'Y'),
(19, 5, 'uploads/1611387867past-event-sundarban-pic7.jpg', '', 'Y'),
(20, 5, 'uploads/1611387876past-event-sundarban-pic8.jpg', '', 'Y'),
(21, 10, 'uploads/1611390253past-event-general-pic1.jpg', '', 'Y'),
(22, 10, 'uploads/1611390259past-event-general-pic2.jpg', '', 'Y'),
(23, 10, 'uploads/1611390269past-event-general-pic3.jpg', '', 'Y'),
(24, 10, 'uploads/1611390276past-event-general-pic4.jpg', '', 'Y'),
(25, 10, 'uploads/1611390281past-event-general-pic6.jpg', '', 'Y'),
(26, 9, 'uploads/1611390477past-event-earthday-pic1.jpg', '', 'Y'),
(27, 9, 'uploads/1611390486past-event-earthday-pic2.jpg', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_last_login`
--

CREATE TABLE `hc_last_login` (
  `log_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `log_date` varchar(255) DEFAULT NULL,
  `log_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_last_login`
--

INSERT INTO `hc_last_login` (`log_id`, `admin_id`, `log_date`, `log_ip`) VALUES
(1, 1, '1609785000', '::1'),
(2, 1, '1609871400', '::1'),
(3, 1, '1609957800', '::1'),
(4, 1, '1610044200', '::1'),
(5, 1, '1610044200', '::1'),
(6, 1, '1610130600', '::1'),
(7, 1, '1610130600', '::1'),
(8, 1, '1610217000', '::1'),
(9, 1, '1610217000', '::1'),
(10, 1, '1610389800', '::1'),
(11, 1, '1610476200', '::1'),
(12, 1, '1610562600', '::1'),
(13, 1, '1610562600', '::1'),
(14, 1, '1610562600', '::1'),
(15, 1, '1610649000', '::1'),
(16, 1, '1610649000', '::1'),
(17, 1, '1610649000', '::1'),
(18, 1, '1611081000', '::1'),
(19, 1, '1611167400', '::1'),
(20, 1, '1611167400', '::1'),
(21, 1, '1611253800', '::1'),
(22, 1, '1611340200', '::1'),
(23, 1, '1611340200', '::1'),
(24, 1, '1611685800', '::1'),
(25, 1, '1611772200', '::1'),
(26, 1, '1611772200', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `hc_leader`
--

CREATE TABLE `hc_leader` (
  `leader_id` int(11) NOT NULL,
  `leader_name` varchar(255) NOT NULL,
  `leader_position` varchar(255) NOT NULL,
  `leader_content` text NOT NULL,
  `leader_pic` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_leader`
--

INSERT INTO `hc_leader` (`leader_id`, `leader_name`, `leader_position`, `leader_content`, `leader_pic`, `status`) VALUES
(2, 'Dr. Soumitra Das', 'President', '<p><span xss=removed>Dr. Soumitra Das is an avid advocate for climate restoration. Currently, he is a policy analyst in the US Federal Government. He also worked in Fortune 500 companies such as Motorola, Corning, Lucent Technologies, Philips Electronics, AT&T in different capacities in the US. Dr. Das chaired several working groups in 3GPP2, an international industry consortium with over 75 companies that developed global standards for wireless telecommunications. He has published numerous papers and spoken in many academic and industry conferences. Dr. Das holds an MBA in Finance from The Wharton School and a Ph.D. in Electrical Engineering from George Mason University. His motto in life, \"leave this world a little better than you found it&#39;&#39;. He is settled in the Washington, DC metro area, USA..</span></p>', 'uploads/1610107810leadrship-pic1.png', 'Y'),
(3, 'Mr. Chandan Kumar Bhattacharyya', 'Vice President', '<p><span xss=removed>Mr. Chandan Banerjee is a veteran soldier. Currently, he works as a program manager in Ananda Bazar Patrika, the largest print media house in eastern India. He also served in Indian Air Force for 20 years. In his leisure, he guides and develops underprivileged students, youth and gives them a direction for a better life with values.</span></p>', 'uploads/1610107848leadrship-pic2.png', 'Y'),
(4, 'Mr. Dwijadas Ghosal', 'General Secretary', '<p xss=removed>D. Ghosal is a Mechanical Engineer with Masters Degree in Business management and has a long experience in cutting edge technologies in different companies in India and abroad. He is settled in Kolkata and at present lives in Barrackpore.</p>\r\n\r\n<p xss=removed>Publication credits include:</p>\r\n\r\n<p xss=removed>Be Everlasting in Love (Novel)</p>\r\n\r\n<p xss=removed>Let’s Go On A Picnic ( An informative and fun reading for children accompanied with rhymes and poems)</p>\r\n\r\n<p xss=removed>Abaar Pherabo (Original Bengali poems collection)</p>\r\n\r\n<p xss=removed>Future plans include the publication of an original English poems collection which is currently in works</p>', 'uploads/1610107884leadrship-pic3.png', 'Y'),
(5, 'Mr. Sudhin Nandi', 'Treasurer', '<p><span xss=removed>Mr. Sudhin Nandi is an environmental engineer. Currently, he works as a Superintending Engineer in the Department of Urban Development and Municipal Affairs, West Bengal, India. He is in charge of many environmental improvement projects of lakes & parks in Kolkata. Mr. Nandi received the \"HUDCO Award for Best Practices for improvement of Living Environment 2015-16\". He was a former secretary of 9th All India People’s Technology Congress 2013, which was organized by the Forum of Scientists, Engineers & Technologists. He has a M.E. degree in environmental engineering from Calcutta University. He is settled in Kolkata.</span></p>', 'uploads/1610107916leadrship-pic4.png', 'Y'),
(6, 'Mr. Ashok Chatterjee', '', '<p><span xss=removed>Fear God, work hard and be honest is my moral. Making of a machine is not only my profession but also my passion. Since childhood, I had inclination about measurement and testing related equipment. Every home equipment needs some quality control unit or system which will ensure its standard. In the 80&#39;s, small manufacturing units couldn&#39;t afford to test equipment because testing facilities were available only in developed countries and it was costly too. So the effort and quality product were not accepted by big houses due to their insolvency. The incapability of those small product houses encouraged me to make such types of test machines as per customer&#39;s budget and Maintaining all purposes and accuracy level as per different National and international standards . So many small factories recognised me as a friend and here lies my interest and satisfaction. I don&#39;t want to be rich with money but rich with love and respect from many organisations whom I could satisfy their technical needs. Besides, I am one of the director of a small NABL laboratory at Kolkata and a contractual partner with HAL.</span></p>', 'uploads/1610107951leadrship-pic5.png', 'Y'),
(7, 'Ms. Proma Das', 'Communication and Advertising, Deputy Manager', '<p><span xss=removed>Her professional career in advertising has come handy to serve her social responsibility. She has over a decade of experience in the industry in creating television commercials, radio jingles, and creatives for digital consumption. At HCI, she is managing communication and public relations of the organization. She ensures that an organization gets a distinct global identity.</span></p>', 'uploads/1610107978leadrship-pic6.png', 'Y'),
(8, 'Ms. Somdatta Basu', 'Content and Digital Marketing, Deputy Manager', '<p><span xss=removed>Content and Digital Marketer with more than 11 years of experience in creating marketing collaterals like case studies, brochures, marketing flyers, webinar webpage, Video scripts, press releases, whitepapers, newsletters, prezi scripts, customer testimonial, and mailers. I create and review landing pages for website and social media content for LinkedIn, Facebook, Youtube and Twitter. With adaptive range of writing styles and considerable experience in working with Content Management System &#40;CMS&#41;, I create search engine optimized (SEO) content that uses great storyline and smart delivery to engage audiences and get good leads while increasing website traffic organically.</span></p>', 'uploads/1610108005leadrship-pic7.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_member`
--

CREATE TABLE `hc_member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `create_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_member`
--

INSERT INTO `hc_member` (`member_id`, `name`, `email_id`, `phno`, `msg`, `create_date`) VALUES
(2, 'pranab', 'pranab@gmail.com', '9874563215', 'test', '1610724898'),
(3, 'pranab', 'pranabsadhukhan1@gmail.com', '9874563215', 'gfgg', '1611416213');

-- --------------------------------------------------------

--
-- Table structure for table `hc_mm_login`
--

CREATE TABLE `hc_mm_login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `original_password` varchar(255) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `type_id` int(11) NOT NULL,
  `chng_pass` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_mm_login`
--

INSERT INTO `hc_mm_login` (`login_id`, `username`, `password`, `original_password`, `admin_type`, `status`, `type_id`, `chng_pass`) VALUES
(1, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin', 'Y', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_news`
--

CREATE TABLE `hc_news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `news_short_desc` text NOT NULL,
  `news_long_desc` text NOT NULL,
  `news_pic` varchar(255) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_date` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_news`
--

INSERT INTO `hc_news` (`news_id`, `news_name`, `news_short_desc`, `news_long_desc`, `news_pic`, `news_image`, `news_date`, `status`) VALUES
(2, 'Press Release 1', '<p><span xss=removed>HCI is collaborating with the Wharton Club of the national capital region for climate restoration. The Wharton School of the university of Pennsylvania is the top business school in the US, some of the notable alumni include: Elon Musk,</span></p>', '<p xss=removed>HCI is collaborating with the Wharton Club of the national capital region for climate restoration. The Wharton School of the university of Pennsylvania is the top business school in the US, some of the notable alumni include: Elon Musk, CEO & Founder of Tesla and SpaceX, Sundar Pichai, CEO of Google, Anil Ambani, Chairman of Reliance Group, Aditya Mittal, President and CFO of ArcelorMittal. The collaboration will include\" should we make it \"The collaboration will\"</p>\r\n\r\n<ul>\r\n <li>Organize events</li>\r\n <li>Explore/promote new market opportunities for climate restoration</li>\r\n <li>Explore/promote public policies favorable to climate restoration</li>\r\n <li>Engage Wharton alums and professors</li>\r\n <li>Create Internship opportunities for Wharton/UPENN students</li>\r\n</ul>', 'uploads/1610217172news-media-pic1.jpg', 'uploads/1610217172news-media-pic1.jpg', '1610217172', 'Y'),
(3, 'Press Release 2', '<p><span xss=removed>Healthy Climate Initiative (HCI) has introduced Summer 2020 Internship opportunity for High School and College students.</span></p>', '<p><span xss=removed>Healthy Climate Initiative (HCI) has introduced Summer 2020 Internship opportunity for High School and College students.</span></p>', 'uploads/1610217298news-media-pic2.png', 'uploads/1610217298news-media-pic2.png', '1610217298', 'Y'),
(4, 'Plantation At Jharkhali, Sundarban', '<p>Team comprising of Shri Ashok Chatterjee, Shri Chandan Bhattacharyya, Shri D Ghosal and Smt Urmi Ghosal visited number of times before the onset of the Project.</p>', '<h4>Backdrop</h4>\r\n                            <p>Team comprising of Shri Ashok Chatterjee, Shri Chandan Bhattacharyya, Shri D Ghosal and Smt Urmi Ghosal visited number of times before the onset of the Project. Finally team had a meeting with Local People, Local authorities and Forest Department.  Details of report regarding plan of actions arrived during the visits featured in earlier report on Sundaban visit.</p>\r\n\r\n       <p>Modus operandi of Healthy Climate Initiative conforms to its network thinking in respect of cluster concept, multi layer plantation of different varieties of plants in sequence covering Mangrove, Miyayaki process for high growth plant and Fruit bearing trees for blending ecology and economy for sustainable process in line with Kaveri Calling concept for income generation in future.  HCI believes putting more efforts and resources on protecting plants than the cost of the plants and carry out these out of their own investment.  It was observed that many organizations did plantation without protecting them, which served more of the optics than real purpose.</p>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n       <div class=\"pic1\">\r\n       <img src=\"images/past-event-sundarban1-pic1.jpg\">\r\n       <h3>meeting with local authorities for execution of the project</h3>\r\n       </div>\r\n                            <h4>Actual Work done </h4>\r\n                            <p>Plantation activities carried out on both side of dam in different layers considering plant height for beautification of forest and soil accretion appropriate for particular plants. Total 1000 different types of sapling (App 2 feet height)  have been planted on both side of dam out of that 800 mangrove plants planted in forest land and 140 food producing plant, 60 domestic plants have been planted in ownership land. The following are the configurations:-</p>\r\n       \r\n       <strong>A. Plantation process in wet & saline river side forest land. </strong>\r\n        <ul>\r\n        <li>(a) 300 Byne trees have been planted in the first Layer from low wet land near river.  This species produce more oxygen in the air, hold the soil and can save the adjacent village from storm.</li> \r\n<li>(b) 100 Kholse trees have been planted next to the Byne tree in the first Layer close to the river.  This species produce flower for best quality honey.</li> \r\n<li>(c) 20 Dhundal trees have been planted next to the Kholse tree in the first Layer close to the river.  This species produce a beautiful looking fruit. </li>\r\n<li>(d) 100 Goran tree have been planted second layer towards dam.  This species can strongly grip the wet soil.</li> \r\n<li>(e) 230 Kakra tree have been planted in the third layer towards dam.  This species can strongly grip the wet soil and gain a good height.</li> \r\n<li>(f) Finally close to the dam, 50 Sundari trees have been planted. That will look beautiful from river side as well as from dam.</li>\r\n        </ul>\r\n       <div class=\"pic1\">\r\n       <img src=\"images/past-event-sundarban1-pic2.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic3.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic4.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic5.jpg\">\r\n       <h3>local people engaged for mangrove plantation in forest</h3>\r\n       </div>\r\n         \r\n       <strong>B. Plantation process in on other side of the dam. </strong>\r\n       <ul>\r\n        <li>a) 30 Mahogany trees have been planted in the first Layer from dam on slope. This is a precious species of tree.</li>\r\n<li>b) 30 Lambu trees have been planted in the next layer on plain land. This species grow very high in sort time.</li>\r\n       </ul>\r\n        \r\n       <p>Suggested Method was Miyayiki process. However process could not be fully adhered to because of various practical reasons.</p>\r\n        \r\n       <div class=\"pic1\">\r\n       <img src=\"images/past-event-sundarban1-pic6.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic7.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic8.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic9.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic9.jpg\">\r\n       </div>\r\n        \r\n       <strong>C. Plantation process in Private land of beneficiaries on other side of the dam</strong>\r\n        \r\n       <ul>\r\n       <li>a) 40 Coconut trees have been planted around a pond. These will produce fruits from 6th year and help economic support to the family.</li>\r\n<li>b) 100 Beetle nut trees have been planted around a pond in between coconut trees. It will produce fruit from 5th year and help economic support to the family.</li>\r\n       <p>The rationale for planting Cocoanut trees and Beetle nuts is due to the fact that in the event of salt water ingress, these trees will continue to survive to support the family’s economy, albeit land degradation is distinct possibility in future.</p> \r\n\r\n       </ul>\r\n        \r\n       <strong><i>Initial Damage: - 6 Mangrove Plants (by Goat Ingress…People were sensitized and damaged plants replaced)</i></strong>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n                            <h4>Barricading</h4>\r\n                            <p>Enter plantation activities were first barricaded by wire fence and net before plantation. </p>\r\n        \r\n       <div class=\"pic1\">\r\n       <img src=\"images/past-event-sundarban1-pic11.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic12.jpg\">\r\n       </div>\r\n        \r\n       <p>Modus operandi of Healthy Climate Initiative conforms to its network thinking in respect of cluster concept, multi layer plantation of different varieties of plants in sequence covering Mangrove, Miyayaki process for high growth plant and Fruit bearing trees for blending ecology and economy for sustainable process in line with Kaveri Calling concept for income generation in future.  HCI believes putting more efforts and resources on protecting plants than the cost of the plants and carry out these out of their own investment.  It was observed that many organizations did plantation without protecting them, which served more of the optics than real purpose.</p>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n                            <h4>Future sustainability</h4>\r\n                            <p>In order to sustain this pilot this project in the long term, arrangement has been made to water, to put organic manure and care for these plants for next six months. Water pump with pipes will be procured so that watering can be done easily without putting much manual effort .  </p>\r\n        \r\n       <div class=\"pic1\">\r\n       <img src=\"images/past-event-sundarban1-pic13.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic14.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic15.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic16.jpg\">\r\n       </div>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n                            <h4>Timeline</h4>\r\n                            <ul>\r\n        <li>a. Ground activities of Pilot Project started on 25.11.2020</li>\r\n        <li>b. Plantation work completed on 12.12.2020</li>\r\n        <li>c. Barricading work  (90%) on 04.12.2020</li>\r\n        <li>d. Pump procurement  25.12.2020</li>\r\n        <li>e. Monitoring , Watering and Nourishment of trees :- Continuous for min next 6 months</li>\r\n\r\n       </ul>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n                            <h4>Justification of the Project : </h4>\r\n                            <p>The plantation of mangroves around villages at the Periphery of the Sundarban has direct implication in rural livelihoods by better safety feeling by guarding them from Climate Disaster, Income Generating activities , creating jobs in nursery and planting activities, improve fisheries catch, provide flowers, fruit, fodder and fuel to rural communities and wildlife, improve carbon sequestration. </p>\r\n       <p>The ecosystem is showing degradation, with loss of important and globally endangered mangrove species due to felling, disease and altered freshwater inputs, changes to vegetation communities, intense and on-going coastal erosion, retreat and cyclonic disaster. </p>\r\n       <p>The Sunder ban delta belts  have entered into the danger zone of submerge due rise of the sea level at an alarming rate and had to withstand devastating impact of the recent Amphan storm caused by the Development of vortex in the Pacific Ocean due to abnormal heat flux. Ghoramara & Moushimi Island are disappearing under sea. </p>  \r\n       <p>Jharkhali is having around 40 km dam that protects this area from sea water ingress during high tide. Menacingly the level of the water during high tide is higher than the Jharkhali plane in most of the areas. An assessment has been made regarding possibility of plantation. Accordingly a clustering plan has been made comprising of 100 meter dam length which will cover Mangrove forestation as well as Agro forestry for income generating activities for adjacent landowners.  In a first phase 10 km dam length will be covered which will cover about 100 clusters. This will cover about beneficiaries about 500 households.</p>\r\n       <p>Mangroves forests are highly productive and diverse ecosystems, providing a wide range of direct ecosystem services for resident populations. In addition, mangroves function as a buffer against frequently occurring cyclones; helping to protect local settlements and protect the remaining population of Bengal tigers. Knowing the above fact in brief, Jharkhali Gram Panchayat team has agreed to work with HCI in Sundarban for improving the ecology by plantation of mangrove trees across the 40 kilometer long river bed in Sundarban - Jharkhali Region and supporting local villagers to improve their economy.</p>\r\n\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n                            <h4>Regarding Jharkhali Panchayat area</h4>\r\n                            <p>Jharkhali is a village and a gram panchayat within the jurisdiction of the Basanti police station in the Basanti CD block in the Canning subdivision of the South 24 Parganas district in the Indian state of HCI Bengal. It is a flat low-lying area in the South Bidyadhari plains. The Matla River is prominent and there are many streams and water channels locally known as khals. A comparatively recent country-wide development is the guarding of the coastal areas with a special coastal force.</p>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n                            <h4>How HCI executed the plan</h4>\r\n                            <p>HCI have conducted meeting with Forest Officer, dedicated competent people and villagers on 10 November 2020 with its proposal and desire to work in Sundarban and obtained their whole hearted and overwhelmed approval. Consequently HCI has identified interested persons and beneficiaries in the Jharkhali to assist them in the plantation program. Accordingly First Pilot Project was executed.</p>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n       <div class=\"pic1\">\r\n       <img src=\"images/past-event-sundarban1-pic17.jpg\">\r\n       <h3>the project implementation team at the site</h3>\r\n       </div>\r\n       <h4>Future Plan </h4>\r\n                            <ul>\r\n        <li>a. In 2nd phase HCI will extend its program by imparting skill development and motivational training for students to work in Sundarban region.</li>\r\n        <li>b. HCI will put effort for fund mobilization from various sources.</li>\r\n        <li>c. HCI has submitted one proposal for CSR approval</li> \r\n        <li>d. If fund can be arranged, Pilot project will be duplicated along another 10 KM, which will develop another 100 clusters.</li>\r\n        <li>e. Thereafter HCI will identify the students from the villages and motivate them to generate their energy for creating an ecosystem and give guidance to overcome the hurdles in the wake of progression and equip them to face the reality.</li>\r\n\r\n       </ul>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n       <h4>Beneficiaries</h4>\r\n                            <ul>\r\n          <li>a. Once  the project is implemented, 500 houses will be directly benefited from erosion  of their land and earning from fruits produced by the plant.</li>\r\n          <li>b. It  will create a demand in nursery for their economic development. </li>\r\n          <li>c. It  will improve ecosystem in the region.</li>\r\n       </ul>\r\n                            </div>\r\n       \r\n       <div class=\"upcoming-text\">\r\n       <div class=\"pic1\">\r\n       <img src=\"images/past-event-sundarban1-pic18.jpg\">\r\n       <img src=\"images/past-event-sundarban1-pic18a.jpg\">\r\n       <h3>local women came forward to work in our project and they have been rewarded</h3>\r\n       </div>\r\n       <h4>Beneficiaries</h4>\r\n                            <ul>\r\n        <li>a. In 2nd phase HCI will extend its program by imparting skill development and motivational training for students to work in Sundarban region.</li>\r\n        <li>b. HCI will put effort for fund mobilization from various sources.</li>\r\n        <li>c. HCI has submitted one proposal for CSR approval</li> \r\n        <li>d. If fund can be arranged, Pilot project will be duplicated along another 10 KM, which will develop another 100 clusters.</li>\r\n        <li>e. Thereafter HCI will identify the students from the villages and motivate them to generate their energy for creating an ecosystem and give guidance to overcome the hurdles in the wake of progression and equip them to face the reality.</li>\r\n\r\n       </ul>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n       <h4>Budget Vs real expenditure for the pilot Project</h4>\r\n       <p><strong>Cost Estimate (for each cluster i.e. 100 meter length) </strong></p>\r\n                            <ul>\r\n        <li>a. Cost of 1000 Mangrove Plant seedling  : Rs. 10000.00</li>\r\n        <li>b. Cost of Plantation by local beneficiaries: Rs. 5000.00</li>\r\n        <li>c. Cost of making Barricade to save the plant : Rs. 22000.00</li>\r\n<li>d. Monthly cash reward to the beneficiary for nourishing the plant for a period of six months : Rs. 18000.00</li>\r\n<li>e. Total Budget of the pilot project for a period of six months: Rs 55000.00 (Rupees Fifty five thousand only).</li> \r\n\r\n\r\n       </ul>\r\n       \r\n       <p><strong>Total Expenditure So far: - Rs 43650.00</strong></p>\r\n                            </div>\r\n        \r\n       <div class=\"upcoming-text\">\r\n       <h4>Pending Expenditure </h4>\r\n       <p><strong>Cost Estimate (for each cluster i.e. 100 meter length) </strong></p>\r\n                            <ul>\r\n        <li>a. Cash Rewards for six months Rs 18000.00</li>\r\n        <li>b. .5 HP Pump with Pipes :Rs 4000.00</li>\r\n        <li>c. Additional Fence/ Labor Etc :- Rs 2500.00</li>\r\n       </ul>\r\n       \r\n       <p><strong>Expected Expenditure for First Cluster: - Rs 70,000.00 (Expenditure overshoot by Rs 15000.00)</strong></p>\r\n       <p><strong>Above expenditure expenses preclude all visits and associated incidental cost, which are borne by HCI visiting personnel.</strong></p>\r\n       \r\n        <img src=\"images/past-event-sundarban1-pic20.jpg\">\r\n        <img src=\"images/past-event-sundarban1-pic19.jpg\">', 'uploads/1610217603news-media-pic3.png', 'uploads/1610217603news-media-pic3.png', '1611383577', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_resources`
--

CREATE TABLE `hc_resources` (
  `resources_id` int(11) NOT NULL,
  `resources_name` varchar(255) NOT NULL,
  `resources_link` varchar(255) NOT NULL,
  `home` enum('Y','N') NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_resources`
--

INSERT INTO `hc_resources` (`resources_id`, `resources_name`, `resources_link`, `home`, `status`) VALUES
(2, '4 MINUTE VIDEO THAT WILL CHANGE YOUR LIFE FOREVER ! SAVE THE ENVIRONMENT !', 'https://www.youtube.com/embed/yV2EK2bMgwk', 'N', 'Y'),
(3, 'Dear Future Generations: Sorry', 'https://www.youtube.com/embed/eRLJscAlk1M', 'N', 'Y'),
(4, 'Introduction to Climate Change', 'https://www.youtube.com/embed/SX7WyyMIqAs', 'N', 'Y'),
(5, 'Must Watch!Best Powerpoint presentation on Environment.', 'https://www.youtube.com/embed/5wAZk0gK-cQ', 'N', 'Y'),
(6, 'MAN vs EARTH', 'https://www.youtube.com/embed/VrzbRZn5Ed4', 'N', 'Y'),
(7, 'THIS IS US - CLIMATE CHANGE IS REAL - You MUST watch this VIDEO!', 'https://www.youtube.com/embed/ap24Ep9vjB0', 'N', 'Y'),
(8, '50 Minutes to Save the World', 'https://www.youtube.com/embed/wthTmQHmuZ0', 'N', 'Y'),
(9, 'Our Environment is Our Life | Sadhguru', 'https://www.youtube.com/embed/6DTJ5h3vx6o', 'N', 'Y'),
(10, 'What really happens to the plastic you throw away - Emma Bryce', 'https://www.youtube.com/embed/_6xlNyWPpB8', 'N', 'Y'),
(11, 'Human Extinction By 2030 -Climate Disruption The Movie', 'https://www.youtube.com/embed/VsU5ZG_BPVw', 'N', 'Y'),
(12, 'Climate change causes Islands to disappear | 60 Minutes Australia', 'https://www.youtube.com/embed/N1cdCUZNh04', 'N', 'Y'),
(13, 'Fleeing climate change — the real environmental disaster | DW Documentary', 'https://www.youtube.com/embed/cl4Uv9_7KJE', 'N', 'Y'),
(14, 'Saving the Environment from Consumerism | Breton Lorway | TEDxCushingAcademy', 'https://www.youtube.com/embed/ZtmOAZoyRa0', 'N', 'Y'),
(15, 'Can we solve global warming? Lessons from how we protected the ozone layer | Sean Davis', 'https://www.youtube.com/embed/08z_xW-szwM', 'N', 'Y'),
(16, 'The case for optimism on climate change | Al Gore', 'https://www.youtube.com/embed/gVfgkFaswn4', 'N', 'Y'),
(17, 'What is ecological restoration?', 'https://www.youtube.com/embed/53pmijCaMIA', 'N', 'Y'),
(18, 'What if we change - documentary on ecosystem restoration', 'https://www.youtube.com/embed/u7ffAzRGqnw', 'N', 'Y'),
(19, 'Hans Rosling: Global population growth, box by box', 'https://www.youtube.com/embed/fTznEIZRkLg', 'N', 'Y'),
(20, 'How not to be ignorant about the world | Hans and Ola Rosling', 'https://www.youtube.com/embed/Sm5xF-UYgdg', 'N', 'Y'),
(21, 'The shape of population to come | Lisa Berkman | TEDxHarvardCollege', 'https://www.youtube.com/embed/qS_ldldHQj4', 'N', 'Y'),
(22, 'Three climate change tipping points are dangerously close', 'https://www.youtube.com/embed/X_sITO8NYrg', 'N', 'Y'),
(23, 'TEDxUIUC - Donald Wuebbles - The Science of Climate Change', 'https://www.youtube.com/embed/c78JmupgjAo', 'N', 'Y'),
(24, 'Will the World End Because of Climate Change? | Apocalypse NowThis', 'https://www.youtube.com/embed/w-inEu9T1m4', 'N', 'Y'),
(25, 'Polar Bear vs Walrus colony | BBC Planet Earth | BBC Studios', 'https://www.youtube.com/embed/v6iDtvGbIOU', 'N', 'Y'),
(26, 'Polar Bear Dying From Global Warming', 'https://www.youtube.com/embed/TAN4RCOaqeE', 'N', 'Y'),
(27, 'Warming Climate Takes its Toll on Polar Bears of Hudson Bay', 'https://www.youtube.com/embed/6slRrUDhw30', 'N', 'Y'),
(28, 'Top 10 Animals That Are Now Extinct Because of Humans', 'https://www.youtube.com/embed/m860nBMcSFM', 'N', 'Y'),
(29, 'This happened on our Earth in April 2018', 'https://www.youtube.com/embed/GqKlALVKsXc', 'N', 'Y'),
(30, 'Will climate change cause earthquakes?', 'https://www.youtube.com/embed/qbF_YlxbA3c', 'N', 'Y'),
(31, 'Earth 101 | National Geographic', 'https://www.youtube.com/embed/HCDVN7DCzYE', 'N', 'Y'),
(32, 'What climate change looks like on the frontline in Greenland', 'https://www.youtube.com/embed/9ZFfyh188SM', 'N', 'Y'),
(33, 'Scientists warn of imminent climate catastrophe without massive changes', 'https://www.youtube.com/embed/OB7KgZBrE_k', 'N', 'Y'),
(34, 'One climate change scientist takes on a roomful of sceptics.', 'https://www.youtube.com/embed/6hCRafyV0zI', 'N', 'Y'),
(35, 'Scientist laughs at climate change skeptics', 'https://www.youtube.com/embed/Dbjk0lhx95w', 'N', 'Y'),
(36, 'Truth Under Siege: Climate Knowledge in an Age of Transparency, Skepticism, and Science Denial', 'https://www.youtube.com/embed/GZ4VHa95EZ0', 'N', 'Y'),
(37, 'Air pollution | AFP Animé', 'https://www.youtube.com/embed/pcPFC72Y1vQ', 'N', 'Y'),
(38, 'Plastic Pollution', 'https://www.youtube.com/embed/1P9syq3f6hQ', 'N', 'Y'),
(39, 'Plastic Pollution', 'https://www.youtube.com/embed/1JZnkXQ1fLk', 'N', 'Y'),
(40, 'Plastics in Oceans: More Damaging Than Climate Change', 'https://www.youtube.com/embed/Kd_QlauNmcw', 'N', 'Y'),
(41, 'The reality of climate change | David Puttnam | TEDxDublin', 'https://www.youtube.com/embed/SBjtO-0tbKU', 'N', 'Y'),
(42, 'Infectious Diseases and Climate Change - Manuel Castro, MD', 'https://www.youtube.com/embed/Y3kE8K6jYM8', 'N', 'Y'),
(43, 'Climate Change 101 with Bill Nye | National Geographic', 'https://www.youtube.com/embed/EtW2rrLHs08', 'N', 'Y'),
(44, 'Environment Day Awareness video 2017 HD', 'https://www.youtube.com/embed/vNoC6gGPBCQ', 'N', 'Y'),
(45, 'Earth Day Video 2019', 'https://www.youtube.com/embed/_1CED8o7mKI', 'N', 'Y'),
(46, 'Earth Day 1970 - 2019: No Time To Waste', 'https://www.youtube.com/embed/J3PqaeE8RVo', 'N', 'Y'),
(47, 'A Short film on Global Warming & Climate Change by GEMI', 'https://www.youtube.com/embed/bHqtgSnhmVM', 'N', 'Y'),
(48, 'A simple and smart way to fix climate change | Dan Miller | TEDxOrangeCoast', 'https://www.youtube.com/embed/0k2-SzlDGko', 'N', 'Y'),
(49, 'Climate change causing environmental refugees in India', 'https://www.youtube.com/embed/F7GcjGlF8wk', 'N', 'Y'),
(50, 'WWF-India: Sundarbans Future Imperfect', 'https://www.youtube.com/embed/eLaaIBIBp10', 'N', 'Y'),
(51, 'Searching for Water in Ethiopia: A Day in the Life', 'https://www.youtube.com/embed/40gZqVBUHUk', 'N', 'Y'),
(52, 'Special Limestone that Can Create Paper and Plastic Products', 'https://www.youtube.com/embed/ywxywcCOkrA', 'N', 'Y'),
(53, 'The Firefighters of the Amazon Fire | Extreme E', 'https://www.youtube.com/embed/nLBqK2tXBfY', 'N', 'Y'),
(54, 'Kiribati: a drowning paradise in the South Pacific | DW Documentary', 'https://www.youtube.com/embed/TZ0j6kr4ZJ0', 'N', 'Y'),
(55, 'The New UN Climate Report: We\'re Screwed', 'https://www.youtube.com/embed/PHdcpxmJ6vg', 'N', 'Y'),
(56, 'HCI Facebook Live 2020 FULL VIDEO', 'https://www.youtube.com/embed/qsmbBMMhj6A', 'N', 'Y'),
(57, 'The Need for Methane Removal to Restore Climate', 'https://www.youtube.com/embed/X4YEcQuppLU', 'N', 'Y'),
(58, 'Connecting the 3 W\'s Warming, Water & Wildlife', 'https://www.youtube.com/embed/t6tNP0ybyXk', 'N', 'Y'),
(59, 'Climate restoration leadership in conversation HCI Earth Day', 'https://www.youtube.com/embed/MZTjznIQAnM', 'N', 'Y'),
(60, 'What Will the World Look Like, 2°C Warmer?', 'https://www.youtube.com/embed/q67IWTQ55vM', 'N', 'Y'),
(61, 'How Climate Scientists Predict the Future', 'https://www.youtube.com/embed/i9EyFghIt5o', 'N', 'Y'),
(62, 'Sinking Sundarbans - Climate voices from India', 'https://www.youtube.com/embed/OuHUx5Y6mK0', 'N', 'Y'),
(63, 'DELTA RISING - The Sundarbans under Climate Change', 'https://www.youtube.com/embed/GPdu6dXK7_w', 'N', 'Y'),
(64, 'How Bangladesh has adapted to climate change | The Economist', 'https://www.youtube.com/embed/xWG_uzLmuug', 'N', 'Y'),
(65, 'Climate refugees in Bangladesh | DW Documentary', 'https://www.youtube.com/embed/co5uywe-1Z8', 'N', 'Y'),
(66, 'WE WILL BRING IT BACK', 'https://www.youtube.com/embed/dprofiWPr6k', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_sale_settings`
--

CREATE TABLE `hc_sale_settings` (
  `setting_id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `hoffice` varchar(255) NOT NULL,
  `boffice` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `branch_address` text NOT NULL,
  `landline_no` text NOT NULL,
  `cell_no` text NOT NULL,
  `branch_phn` text NOT NULL,
  `message` text NOT NULL,
  `office` longtext NOT NULL,
  `email` text NOT NULL,
  `fb_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `google_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `pinterest_link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_sale_settings`
--

INSERT INTO `hc_sale_settings` (`setting_id`, `company_name`, `hoffice`, `boffice`, `address`, `branch_address`, `landline_no`, `cell_no`, `branch_phn`, `message`, `office`, `email`, `fb_link`, `twitter_link`, `google_link`, `youtube_link`, `instagram_link`, `pinterest_link`) VALUES
(1, 'Healthy Climate Initiative', '8050008705', '', 'Healthy Climate Initiative<br>\r\nSemi-Basement Area ,<br>\r\nUnion Bank Building,<br>\r\nNona Chandanpukur Bazaar,<br>\r\nBarrackpore, Kolkata-700122', '', '', '', '9874573556', '', '', 'info@hci.in.net', 'https://www.facebook.com/Healthy-Climate-Initiative-104466384461665/', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hc_solution`
--

CREATE TABLE `hc_solution` (
  `solution_id` int(11) NOT NULL,
  `solution_name` varchar(255) NOT NULL,
  `solution_content` text NOT NULL,
  `solution_link` varchar(255) NOT NULL,
  `solution_pic` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_solution`
--

INSERT INTO `hc_solution` (`solution_id`, `solution_name`, `solution_content`, `solution_link`, `solution_pic`, `status`) VALUES
(2, 'SYNTHETIC LIMESTONE', '<p>Limestone, which is the principal component of concrete, can be made synthetically extracting CO2 from the atmosphere. Synthetic limestone, which has 44% CO2 by weight, can be used in buildings and roads and manufactured at a cost similar to natural limestone. </p>  <p class=\"moretext\"> Blue Planet, a US based company, manufactures synthetic limestone and use it for a construction in San Francisco International Airport. Because of the high global demand for concrete, synthetic limestone is capable of restoring climate in 20 years, if the use of natural limestone is replaced by synthetic limestone.</p>', '<p><a href=\"http://www.blueplanet-ltd.com/\" target=\"_blank\">www.blueplanet-ltd.com</a></p>', 'uploads/1610105212solution-pic1.png', 'Y'),
(3, 'Ocean Iron Fertilization', '<p>Plants create their food using CO2 from the atmosphere and release oxygen into the atmosphere via photosynthesis. Because of the vast volume of ocean, marine plants produce 70% of atmospheric oxygen.Unfortunately, there has been a significant decline in marine</p> <p class=\"moretext\">   photosynthesis (40% since 1950) due to the depletion of iron in ocean chlorophyll, the key ingredient for photosynthesis.\r\n                            Marine plants used to obtain the iron particles from the dry land surfaces via wind. However, the CO2 emissions into the atmosphere in the last 200 years made those dry land surfaces slightly more moist and sticky, and consequently, the wind is carrying less amount of iron dust into the ocean. This problem can be easily solved by adding a small amount of iron into the ocean and revitalizing marine photosynthesis. This has the potential to remove the excess 1 trillion tons of CO2 from the atmosphere and thus restore climate in 20 years. It also has other benefits, for example: Photosynthesis will generate plankton, which will increase the fish population in the ocean providing food for people. In addition, the plankton will generate white clouds which will cool the earth by reflecting sunlight.</p>', '<p><a href=\"https://en.wikipedia.org/wiki/Iron_fertilization\" target=\"_blank\">https://en.wikipedia.org</a></p>\r\n\r\n<p><a href=\"https://bg.copernicus.org/articles/15/5847/2018/\">https://bg.copernicus.org</a></p>', 'uploads/1610105571solution-pic2.png', 'Y'),
(4, 'PLANTING TREES AFFORESTATION & REFORESTATION', '<p>Planting trees can remove the atmospheric CO2 via photosynthesis, improve soil health and productivity, and thus, increase global food production.Afforestation refers to planting trees creating new forests and reforestation refers to restoring existing forests. </p> <p class=\"moretext\">   While planting trees can play an important role in removing CO2 from the atmosphere, they are not sufficient: trees take many years to grow, and require resources to protect them from human and natural impacts such as wildfires, drought and pest infestations. They could also compete for land used for agriculture just as food production needs to increase to feed the growing world population. </p>', '<p><a href=\"https://foundationforclimaterestoration.org/wp-content/uploads/2019/09/20190916b_f4cr4_white-paper.pdf\" xss=removed target=\"_blank\">https://foundationforclimaterestoration.org</a></p>', 'uploads/1610105742solution-pic3.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hc_upevent`
--

CREATE TABLE `hc_upevent` (
  `upevent_id` int(11) NOT NULL,
  `upevent_name` varchar(255) NOT NULL,
  `upevent_date` varchar(255) NOT NULL,
  `upevent_time` varchar(255) NOT NULL,
  `upevent_venue` varchar(255) NOT NULL,
  `upevent_content` text NOT NULL,
  `upevent_pic` varchar(255) NOT NULL,
  `upevent_image` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_upevent`
--

INSERT INTO `hc_upevent` (`upevent_id`, `upevent_name`, `upevent_date`, `upevent_time`, `upevent_venue`, `upevent_content`, `upevent_pic`, `upevent_image`, `status`) VALUES
(2, 'INTERFACE WITH SADHGURU FOCUSING ON CLIMATE CHANGE', '9th January 2021', '8.30 PM IST (India) / 3.00 PM GMT ( UK) / 10.00 AM ET ( USA)', '', '<p>Welcome! You are invited to join a webinar: Interface with Sadhguru Focusing on Climate Change. After registering, you will receive a confirmation email about joining the webinar.</p>\r\n\r\n<p>Humanity is facing an existential threat from climate change. HCI&#39;s mission is to restore climate and make it safe and healthy for future generations. This webinar features HCI’s interview with Sadhguru on Climate Change and Sustainable Environment.</p>\r\n\r\n<p>Ranked amongst the fifty most influential people in India, Sadhguru is a Yogi, mystic, and visionary. He has been conferred the Padma Vibhushan, India’s highest annual civilian award, accorded for exceptional service. Sadhguru has launched mega ecological initiatives. The movements Rally for Rivers and Cauvery Calling address the urgent need to revitalize Indian Rivers and issues related to Soil, Water, and Climate Change. Sadhguru has been invited by the UN, UNE, and UNCCD to discuss global solutions to the world’s ecological issues. Sadhguru founded Isha Foundation, a non-profit human service organization. Isha is supported by over 11 million volunteers in more than 300 centers worldwide</p>\r\n\r\n<p>You can participate in the webinar via Zoom or Facebook Live:</p>\r\n\r\n<p><a href=\"https://us02web.zoom.us/webinar/register/WN_Udc0lWSMRPCKVyN8rbpgnA\" target=\"_blank\">(1) Zoom Registration Link: https://lnkd.in/dpY63nQ</a></p>\r\n\r\n<p><a href=\"https://www.facebook.com/Healthy-Climate-Initiative-104466384461665/\" target=\"_blank\">(2) Facebook Live Link: https://lnkd.in/dmcUuJ2</a></p>', 'uploads/1610698221upcoming-event-pic.jpeg', 'uploads/1611390605pic.jpg', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hc_banner`
--
ALTER TABLE `hc_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `hc_blog`
--
ALTER TABLE `hc_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `hc_climate`
--
ALTER TABLE `hc_climate`
  ADD PRIMARY KEY (`climate_id`);

--
-- Indexes for table `hc_cms`
--
ALTER TABLE `hc_cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `hc_comment`
--
ALTER TABLE `hc_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `hc_event`
--
ALTER TABLE `hc_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `hc_eventpic`
--
ALTER TABLE `hc_eventpic`
  ADD PRIMARY KEY (`eventpic_id`);

--
-- Indexes for table `hc_last_login`
--
ALTER TABLE `hc_last_login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `hc_leader`
--
ALTER TABLE `hc_leader`
  ADD PRIMARY KEY (`leader_id`);

--
-- Indexes for table `hc_member`
--
ALTER TABLE `hc_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `hc_mm_login`
--
ALTER TABLE `hc_mm_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `hc_news`
--
ALTER TABLE `hc_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `hc_resources`
--
ALTER TABLE `hc_resources`
  ADD PRIMARY KEY (`resources_id`);

--
-- Indexes for table `hc_sale_settings`
--
ALTER TABLE `hc_sale_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `hc_solution`
--
ALTER TABLE `hc_solution`
  ADD PRIMARY KEY (`solution_id`);

--
-- Indexes for table `hc_upevent`
--
ALTER TABLE `hc_upevent`
  ADD PRIMARY KEY (`upevent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hc_banner`
--
ALTER TABLE `hc_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hc_blog`
--
ALTER TABLE `hc_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hc_climate`
--
ALTER TABLE `hc_climate`
  MODIFY `climate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hc_cms`
--
ALTER TABLE `hc_cms`
  MODIFY `cms_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hc_comment`
--
ALTER TABLE `hc_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hc_event`
--
ALTER TABLE `hc_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hc_eventpic`
--
ALTER TABLE `hc_eventpic`
  MODIFY `eventpic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hc_last_login`
--
ALTER TABLE `hc_last_login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hc_leader`
--
ALTER TABLE `hc_leader`
  MODIFY `leader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hc_member`
--
ALTER TABLE `hc_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hc_mm_login`
--
ALTER TABLE `hc_mm_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hc_news`
--
ALTER TABLE `hc_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hc_resources`
--
ALTER TABLE `hc_resources`
  MODIFY `resources_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `hc_sale_settings`
--
ALTER TABLE `hc_sale_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hc_solution`
--
ALTER TABLE `hc_solution`
  MODIFY `solution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hc_upevent`
--
ALTER TABLE `hc_upevent`
  MODIFY `upevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
