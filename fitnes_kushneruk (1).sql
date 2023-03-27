
CREATE TABLE `orders` (
  `id_Order` int NOT NULL,
  `client` int NOT NULL,
  `trainer` int NOT NULL,
  `goal` varchar(300) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `created_at` date NOT NULL
);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_order` int NOT NULL,
  `id_status` int NOT NULL,
  `updated_at` timestamp NOT NULL
) ;

-- --------------------------------------------------------

--
-- Структура таблицы `plan_workouts`
--

CREATE TABLE `plan_workouts` (
  `id_plan` int NOT NULL,
  `client` int NOT NULL,
  `dateTraining` date NOT NULL,
  `status` int NOT NULL,
  `trainer` int NOT NULL
);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `title` varchar(20) NOT NULL
) ;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `title`) VALUES
(1, 'Администратор'),
(2, 'Клиент'),
(3, 'Тренер');

-- --------------------------------------------------------

--
-- Структура таблицы `status_order`
--

CREATE TABLE `status_order` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Структура таблицы `types_training`
--

CREATE TABLE `types_training` (
  `id_training` int NOT NULL,
  `title` varchar(100) NOT NULL
);
-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `birthday` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `pasword` varchar(100) NOT NULL,
  `role` int NOT NULL,
  `awards` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL
) ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `surname`, `name`, `patronymic`, `birthday`, `photo`, `gender`, `phone`, `pasword`, `role`, `awards`, `created_at`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', '2000-01-01', 'Trener1.png', 'M', '+79458254012', '123456', 3, 'Мастер спорта по легкой атлетике ', '2023-02-21 11:50:33'),
(2, 'Фамов', 'Сергей', 'Иванович', '1998-01-01', 'Trener2.png', 'M', '+72458745984', '654321', 3, '-', '2023-02-21 11:50:33'),
(3, 'Сидорова', 'Екатерина', '-', '1998-01-01', 'Trener3.png', 'W', '+79123456789', '453448', 3, '-', '2023-02-21 11:50:33');

-- --------------------------------------------------------

--
-- Структура таблицы `workouts`
--

CREATE TABLE `workouts` (
  `id_workout` int NOT NULL,
  `type` int NOT NULL,
  `number_of_approaches` int NOT NULL,
  `number_of_repetitions` int NOT NULL,
  `pulse` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `plan_workout` int NOT NULL
) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_Order`),
  ADD KEY `client` (`client`,`trainer`),
  ADD KEY `coach` (`trainer`),
  ADD KEY `trainer` (`trainer`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_order` (`id_order`);

--
-- Индексы таблицы `plan_workouts`
--
ALTER TABLE `plan_workouts`
  ADD PRIMARY KEY (`id_plan`),
  ADD KEY `client` (`client`),
  ADD KEY `trainer` (`trainer`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types_training`
--
ALTER TABLE `types_training`
  ADD PRIMARY KEY (`id_training`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- Индексы таблицы `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id_workout`),
  ADD KEY `plan_workout` (`plan_workout`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_Order` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `plan_workouts`
--
ALTER TABLE `plan_workouts`
  MODIFY `id_plan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `types_training`
--
ALTER TABLE `types_training`
  MODIFY `id_training` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id_workout` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`trainer`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_Order`),
  ADD CONSTRAINT `order_status_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_order` (`id`);

--
-- Ограничения внешнего ключа таблицы `plan_workouts`
--
ALTER TABLE `plan_workouts`
  ADD CONSTRAINT `plan_workouts_ibfk_1` FOREIGN KEY (`client`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `plan_workouts_ibfk_2` FOREIGN KEY (`trainer`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`);

--
-- Ограничения внешнего ключа таблицы `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`plan_workout`) REFERENCES `plan_workouts` (`id_plan`),
  ADD CONSTRAINT `workouts_ibfk_2` FOREIGN KEY (`type`) REFERENCES `types_training` (`id_training`);
COMMIT;



